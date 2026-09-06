var cgi = 'https://www.doctor-naito.com/cgi-bin/access_cgi/report.cgi?';
var dir = 'dir=blog';
var pix = 'pix=' + screen.width + 'x' + screen.height + 'x' + screen.colorDepth;
var ref = 'ref=' + document.referrer;
var req = 'req_title=' + encodeURI(document.title);
var dat = dir + '&amp;' + pix + '&amp;' + ref + '&amp;' + req;
document.write('<img src="' + cgi + dat + '" width="1" height="1" alt="" />');
