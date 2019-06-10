# PHP-RESTful-MVC-Framework
A modification to Brad Traversy's MVC framework to allow for RESTful routing. This is my first real PHP project away from tutorials in an attempt to understand the inner workings of websites before learning a framework.

I've designed this simple framework to work very similar to express.

### Define a route
```
// Init Router class
$router = new Router();

// An example of setting the index route.
$router->get('/', function($response) {
    $response->loadController('home', 'index');
});

// Run the app
$router->run();
```
The $response variable allows the $router class to be passed back into the user defined function which in turn allows you to use the internam loadController() function.

The Router class supports GET, POST, PUT and DELETE which all have their own fucntion as well as dynamic routes i.e "/posts/1 or /posts/34":
```
$router->get('/posts', function($response) {
    $response->loadController('posts', 'getPosts');
});

$router->get('/posts/(int:id)', function($response, $routeVars) {
    $response->loadController('posts', 'getPost', [$routeVars]);
});

$router->post('/posts', function($response) {
    $response->loadController('posts', 'addPost');
});

$router->put('/posts/(int:id)', function($response, $routeVars) {
    $response->loadController('home', 'editPost', [$routeVars]);
});

$router->delete('/posts/(int:id)', function($response, $routeVars) {
    $response->loadController('home', 'deletePost', [$routeVars]);
});

```
If using a dynamic route then an array of the route variables will be passed back to the user function. You can then use the variable there or pass it onto the controller. The format is returned as such:
```
[
  'id' => 1
]
```
### Controller Logic
You then just need to tell your controller if it should expect the route variables or not as follows:
```
class Pages extends Controller {

    // Added $routeVars as an argument because a dynamic route is being used and passed through.
    public function getPost($routeVars) {
        $data = array(
            'title' => "Get a post by Id"
        );
        
        // Logic goes here
        
        $this->view("home/post", $data);
    }
    
    // No dynamic route is being used so no need to pass $routeVars through
    public function addPost() {
        $data = array(
            'title' => "Added a post"
        );
        
        // Logic goes here
        
        $this->view("pages/posts", $data);
    }
}
```
### Form format
In order to use PUT and DELETE you need to add a hidden input type with a name of "_method" and a value of "PUT" or "DELETE" and set the method to POST:
```
<form action="" method="POST">
  <input type="text" name="postTitle">
  <input type="text" name="postBody">
  <input type="hidden" name="_method" value="PUT">
  <input type="submit">
</form>
```
