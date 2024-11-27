//<![CDATA[
(function() {
  try {
    var script = document.createElement('script');
    if ('async') {
      script.async = true;
    }
    script.src = 'https://browsersync-HOST/browser-sync/browser-sync-client.js?v=2.29.1'.replace("HOST", location.hostname);
    if (document.body) {
      document.body.appendChild(script);
    }
  } catch (e) {
    console.error("Browsersync: could not append script tag", e);
  }
})()
//]]>
