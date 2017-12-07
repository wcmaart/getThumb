# getThumb
This php file takes an Object ID, looks up the appropriate IIIF manifest (json),  and returns an image from eMuseum 5.1.

Ex: 

http://<i></i>domain.com<i></i>/getThumb.php?objectid=10

...returns an image for the object with id=10

This helps provide thumbnails for [open-access data sets](https://github.com/wcmaart/collection), where the object id is available, but the active image url is not.

Requires:eMuseum 5.1, IIIF
