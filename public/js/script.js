btnNext.onclick = () => {
    if (compt < 2) {
        compt++;
        if (compt == 2) {
            btnNext.style.display = "none";
            cercle[compt].innerHTML = '<svg class="h-8 w-8 text-orange-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>'
            corectAnswears(table);
        }
        if (compt == 1) {
            Getdata();
            nextQuestion.style.visibility = "visible";
            cercle[compt - 1].innerHTML = '<svg class="h-8 w-8 text-orange-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 12l5 5l10 -10" /></svg>'
            btnNext.style.visibility = "hidden";
        }
        image.style.display = "none"
        // content of divs
        conditionBlock[compt].style.display = "block";
        conditionBlock[compt - 1].style.display = "none";
        // end
        cercle[compt].style.background = color;
        cercle[compt].style.color = "#ff9900";
        cercle[compt - 1].style.background = color;
        progressFull.style.width = `${compt * 5 * 10}%`;
    }
}
