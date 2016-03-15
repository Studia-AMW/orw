// Przykład – obliczanie silni w JavaScript i WebWorkers:

function silnia(n) {
    if (n == 0)
        return 1;
    else
        return (n * silnia(n-1));
}
 
var i = 0;
var wynik = 0;

function timedCount() {
    i = i + 1;
	
	wynik = silnia(i);
    postMessage(wynik);
		
    setTimeout("timedCount()",500);
}

timedCount();