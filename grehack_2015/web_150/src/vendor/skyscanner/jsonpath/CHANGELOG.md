Changelog
=========
0.7.1
-----
* Bug fix when accessing an array with a negative index. It now behaves as expected.

0.7
---
* set now creates non-existent intermediate objects. 
(p.e. if quering '$.a' results in false, when setting 
'$.a.b' to a value '$.a' will be created as a result of this).

0.6
---
* Added custom Exception classes:
    * `InvalidJsonException` is thrown when an invalid values is given to the 
    JsonObject constructor.
    * `InvalidJsonPathException` is thrown when an invalid JSONPath is given.

0.5
---
* Added getJsonObjects to get child JsonObjects that reference the original JsonObject contents. 
This is also affected by _smartGet_.

0.4
---
* Added support for json objects with fields with names that are not valid javascript variable
 names.
* Fixed error in smart get when accessing a list of names or list of indices and only one existed in the object.

0.3
---
* Added smart get

0.2
---
* Added errors when invalid json type is passed to construct
* Efficiency improvements
* All tokens are constants

0.1
---
* Basic JsonPath functionality
