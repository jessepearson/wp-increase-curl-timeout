# WP Increase cURL Timeout
Increases the timeout for cURL requests in WordPress to 5 seconds, if needed.

### Why
Sometimes plugins have cURL connections going out from WordPress, this will make sure that those requests have a timeout of 5 seconds. This can be increased by manually editing the plugin. 

### Symptoms
* Plugins that sync fail, typically something about a cURL timeout will be logged. 

### Usage
1. Install plugin and activate
1. Try your sync again. 