Bancha - Combining ExtJS and CakePHP
====================================
Currently in Beta release.

This is a fork of Bancha (https://github.com/Bancha/Bancha.git). I need to implement display and editing of associated
model data, something Bancha doesn't yet support out of the box

The used sample data can be found in database.sql

The directories _Model and _Controller should be linked to app/Model and app/Controller. Under Windows 7 this can be done
with mklink /J "_Controller" "..\..\Controller"

The test page can be viewed at <your server & path>/bancha/testpage.html


What is Bancha?
---------------

Bancha combines Ext JS 4 and CakePHP 2. Basically it: 

*   handles all communication between server and client
*   shares all schema and validation rules in CakePHP with ExtJS
*   enables asynchronous and batched request to the server
*   automatically implements CRUD for all remotable models
*   is well-tested with PHPUnit and Jasmine

So with Ext JS and CakePHP in the background we aim to become the most elegant and powerful JavaScript to PHP comunication framework.


More information:
-----------------

*   [Overview](http://banchaproject.org/)
*   [Installation and Usage](https://github.com/Bancha/Bancha/wiki/)
*   [Updates on Twitter](http://twitter.com/#!/banchaproject)


__Happy coding!__






------------------------------
THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.