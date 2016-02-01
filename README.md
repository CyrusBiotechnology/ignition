# Ignition

Ignition's purpose is to allow an unprivileged user to turn on machines that 
have been turned off. You may think of it as a new scope; 
https://www.googleapis.com/auth/compute/instance.start. It is so simple that an 
implementation can be cooked up in a few hours, but it's immensely useful as a 
cost-saving feature if you provide VMs to your users.

It works is by mapping a long and complex key to the name of a VM. If a key is 
given that maps to a VM's name, the app will attempt to start that VM.

# Setup

1. Grab a release from the releases page of CyrusBiotechnology/ignition
2. Run [composer](https://getcomposer.org/doc/01-basic-usage.md) (usually
something like: `php composer.phar install`)
3. Copy the `app.example.yaml` file to `app.yaml` and update it if you like
4. Copy the `config.example.php` and update the values there to match your 
Environment. Add at least one key => vm name mapping. Keys should be quite long 
(probably longer than the 20 char example)
5. Set up your GCE project, grab 
[a copy](https://console.cloud.google.com/start/appengine) of the App Engine 
SDK for local development and deployment
6. Test locally
7. Deploy to your project
