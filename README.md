Data-uri Images/Fonts
=====================

I recently did some website optimization on my own blog and one of the optimizations was to reduce the amount of http requests for Fonts and Images.  Instead of queryin 4 requests for Fonts, I decided it would be easier to embed the font's using HTML5/CSS3's new data uri which is basically a base64 image embedding in your stylesheet or whatever.

To simplify doing this I simply created a simple CodeIgniter controller that read the files and outputted the correct markup.  I figured other people might find it useful, so here it is.

Hopefully someone will find this helpful.

Cheers :beer:

## Follow me

 - [Twitter](https://twitter.com/svizion)
 - [My Blog](http://blog.shawnc.org)