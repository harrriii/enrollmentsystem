
/*jslint white: true, browser: true, onevar: true, undef: true, nomen: true,
	eqeqeq: true, plusplus: true, regexp: true, newcap: true, immed: true */
// (good parts minus bitwise and strict, plus white.)

/**
 * Nibbler - Multi-Base Encoder
 *
 * version 2013-04-24
 *
 * Options:
 *   dataBits: The number of bits in each character of unencoded data.
 *   codeBits: The number of bits in each character of encoded data.
 *   keyString: The characters that correspond to each value when encoded.
 *   pad (optional): The character to pad the end of encoded output.
 *   arrayData (optional): If truthy, unencoded data is an array instead of a string.
 *
 * Example: 
 *
 * var base64_8bit = new Nibbler({
 *     dataBits: 8,
 *     codeBits: 6,
 *     keyString: 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/',
 *     pad: '='
 * });
 * base64_8bit.encode("Hello, World!");  // returns "SGVsbG8sIFdvcmxkIQ=="
 * base64_8bit.decode("SGVsbG8sIFdvcmxkIQ==");  // returns "Hello, World!"
 *
 * var base64_7bit = new Nibbler({
 *     dataBits: 7,
 *     codeBits: 6,
 *     keyString: 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/',
 *     pad: '='
 * });
 * base64_7bit.encode("Hello, World!");  // returns "kZdmzesQV9/LZkQg=="
 * base64_7bit.decode("kZdmzesQV9/LZkQg==");  // returns "Hello, World!"
 *
 */
var Nibbler = function (options) {
	"use strict";
	
	// Code quality tools like jshint warn about bitwise operators,
	// because they're easily confused with other more common operators,
	// and because they're often misused for doing arithmetic.  Nibbler uses
	// them properly, though, for moving individual bits, so turn off the warning.
	/*jshint bitwise:false */
	
	var construct,
		
		// options
		pad, dataBits, codeBits, keyString, arrayData,
		
		// private instance variables
		mask, group, max,
		
		// private methods
		gcd, translate,
		
		// public methods
		encode, decode;
	
	// pseudo-constructor
	construct = function () {
		var i, mag, prev;

		// options
		pad = options.pad || '';
		dataBits = options.dataBits;
		codeBits = options.codeBits;
		keyString = options.keyString;
		arrayData = options.arrayData;
		
		// bitmasks
		mag = Math.max(dataBits, codeBits);
		prev = 0;
		mask = [];
		for (i = 0; i < mag; i += 1) {
			mask.push(prev);
			prev += prev + 1;
		}
		max = prev;
		
		// ouput code characters in multiples of this number
		group = dataBits / gcd(dataBits, codeBits);
	};

	// greatest common divisor
	gcd = function (a, b) {
		var t;
		while (b !== 0) {
			t = b;
			b = a % b;
			a = t;
		}
		return a;
	};

	// the re-coder
	translate = function (input, bitsIn, bitsOut, decoding) {
		var i, len, chr, byteIn,
			buffer, size, output,
			write;
		
		// append a byte to the output
		write = function (n) {
			if (!decoding) {
				output.push(keyString.charAt(n));
			} else if (arrayData) {
				output.push(n);
			} else {
				output.push(String.fromCharCode(n));
			}
		};

		buffer = 0;
		size = 0;
		output = [];
		
		len = input.length;
		for (i = 0; i < len; i += 1) {
			// the new size the buffer will be after adding these bits
			size += bitsIn;
			
			// read a character
			if (decoding) {
				// decode it
				chr = input.charAt(i);
				byteIn = keyString.indexOf(chr);
				if (chr === pad) {
					break;
				} else if (byteIn < 0) {
					throw 'the character "' + chr + '" is not a member of ' + keyString;
				}
			} else {
				if (arrayData) {
					byteIn = input[i];
				} else {
					byteIn = input.charCodeAt(i);
				}
				if ((byteIn | max) !== max) {
					throw byteIn + " is outside the range 0-" + max;
				}
			}
			
			// shift the buffer to the left and add the new bits
			buffer = (buffer << bitsIn) | byteIn;
			
			// as long as there's enough in the buffer for another output...
			while (size >= bitsOut) {
				// the new size the buffer will be after an output
				size -= bitsOut;
				
				// output the part that lies to the left of that number of bits
				// by shifting the them to the right
				write(buffer >> size);
				
				// remove the bits we wrote from the buffer
				// by applying a mask with the new size
				buffer &= mask[size];
			}
		}

		// If we're encoding and there's input left over, pad the output.
		// Otherwise, leave the extra bits off, 'cause they themselves are padding
		if (!decoding && size > 0) {
		
			// flush the buffer
			write(buffer << (bitsOut - size));

			// add padding string for the remainder of the group
			while (output.length % group > 0) {
				output.push(pad);
			}
		}

		// string!
		return (arrayData && decoding) ? output : output.join('');
	};
	
	/**
	 * Encode.  Input and output are strings.
	 */
	encode = function (input) {
		return translate(input, dataBits, codeBits, false);
	};
	
	/**
	 * Decode.  Input and output are strings.
	 */
	decode = function (input) {
		return translate(input, codeBits, dataBits, true);
	};
	
	this.encode = encode;
	this.decode = decode;
	construct();
};