# Swap.js

![image](https://user-images.githubusercontent.com/6168083/183243666-7d5cae1d-d0ba-4b69-85a5-f60a4099e432.png)

The goal of the **Swap.js** project is to make a "HTML over the wire" micro-library which facilitates AJAX-style navigation, in less than ~ 100 lines of code. (See "Why?" paragraph below)

This is inspired by the recent libraries that make "HTML over the wire" techniques popular again (HTMX, Unpoly, Hotwire...).

Features:

* AJAX-style navigation and replacement of HTML elements of the page
* handling of the browser history (history back button, etc.)
* automatic code launcher when HTML elements are created/removed in the DOM
* adapted for single page applications (or not)

Important aspects:

* vanilla JS (no external tool needed: no bundler, no webpack, no TypeScript compiler, no minification needed...)
* the good old `<a href="..."` navigation still works if JavaScript is disabled in the browser (progressive enhancement)
* you can keep your current server-side rendering solution (PHP, Python...)

# Simple example

See `demo1` folder.

`index.html`
```
<body>
<a href="index.html" swap-target="#container" swap-history="true">Home</a>
<a href="screen2.html" swap-target="#container" swap-history="true">Go to screen 2</a>
<div id="container">Container</div>
<script src="../swap.js"></script>
</body>
```

`screen2.html`
```
<body>
<a href="index.html" swap-target="#container" swap-history="true">Home</a>
<a href="screen2.html" swap-target="#container" swap-history="true">Go to screen 2</a>
<div id="container">You are on screen 2!</div>
<script src="../swap.js"></script>
</body>
```

When you click on *"Go to screen 2"*, the element `#container` is replaced by `screen2.html`'s `#container`. Simple isn't it?

Of course, in real life, you don't want to duplicate the same header and footer in multiple HTML files, and you will want to use server-side rendering: for a more complete example, see `demo2` folder with PHP code, multiple screens, multiple containers to be replaced, and also with some JS code that is run automatically when elements are inserted/destroyed in the DOM.

# Documentation

You can use these 3 features:

* **`swap-target` (HTML attribute)**

    If present on a `<a href="..."` link, then, when clicked, a HTTP request is done with `fetch()` and the HTML fragment of the response *matched by the CSS selector* `swap-target` will replace the part of the current page *matched by this same selector*.

    This little detail is quite powerful because it allows you to continue to always render the full page server-side, no matter if only a HTML fragment will be used client-side (because AJAX navigation) or if the full page is required (for example, because the user did a refresh on the navigator). If you find in certain cases that it's a waste of bytes to send the full page in every case you can also render *only* a fragment server-side, based on the presence of HTTP request header `swap-target` (`$_SERVER['HTTP_SWAP_TARGET']` in PHP), but this is *purely optional*.


* **`swap-history` (HTML attribute)**

    If `true`, a new browser history element will be pushed when the link is clicked.

    When going back in history, an AJAX-call is made to update `<body>` based on the history URL.  
    If you want to update something else than `<body>` when going back in history, you can set the HTML attribute `swap-history-restore` on the element which will be restored.

* **Loader/unloader JS functions when DOM elements are added/removed**

  Sometimes, you want to execute JS code when a new HTML fragment is inserted, or when it is removed. Here is how it works: 

    ```
    Swap.loaders['.screen2'] = () => {
        console.log("An element with class screen2 has just been inserted in the DOM.")
        var task = setInterval(() => { console.log("On repeat!"); }, 1000);
        return () => { clearInterval(task); };                // in a loader function, you return an unloader function which will be executed when the element is removed from DOM
    }
    ```

# Why a 100 line-of-code limit?

When you start a new web project and decide to use a rather new library xyz.js, you always take the risk that:

* eventually xyz.js will not be maintained anymore
* a feature is missing but you don't know where to add it in the 50 different source code files with a total of 10'000 lines of code
* there is a strange bug but you can't find where it is in these 10k lines of code
* the library has hundreds of features you don't need

For this reason, this micro-library will always stay single-file and not have more than ~ 100 lines of code. No complex feature will be added, it will stay very basic. The benefit of all this is that you can read, understand, and improve the full code of the micro-library in less than 1 hour of your time.

# Contributions

Issues, ideas, discussions are welcome - please open an issue before doing a pull request to be sure it is necessary.

# Author

Joseph Ernest

# License

MIT
