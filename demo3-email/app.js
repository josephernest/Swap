// Here you can add custom JS when DOM elements are added/destroyed.
Swap.loaders['.email-display'] = () => {
    console.log("Displaying a new email...")
    document.getElementById('infobox').classList.add("visible");
    let time = new Date();
    let task = setInterval(() => { 
        document.getElementById('infobox').innerHTML = "You are reading this mail since " + ((new Date() - time) / 1000).toFixed(1) + " seconds";
    }, 100);
    return () => {  // unloader function
        console.log("Quitting the email display screen...")
        document.getElementById('infobox').innerHTML = "";
        document.getElementById('infobox').classList.remove("visible");
        clearInterval(task); 
    };  
}
