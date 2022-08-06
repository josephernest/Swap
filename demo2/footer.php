<script src="../swap.js"></script>
<script>
Swap.loaders['.screen2'] = () => {
    console.log("screen2 loaded");
    let screen2_interval = setInterval(() => { console.log("screen2 repeat every 1000 ms"); }, 1000);
    return () => { console.log("screen2 clear"); clearInterval(screen2_interval); };  // unloader function
}
Swap.loaders['.screen3'] = () => {
    console.log("screen3 loaded");
    let screen3_interval = setInterval(() => { console.log("screen3 repeat every 200 ms"); }, 200);
    return () => { console.log("screen3 clear"); clearInterval(screen3_interval); };  // unloader function
}
</script>
</body>
</html>