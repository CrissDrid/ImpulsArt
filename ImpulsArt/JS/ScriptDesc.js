var desc = document.getElementById("desc");
var text = document.getElementById("text");
var limit = 155;
text.textContent = 0 + "/" + limit;

desc.addEventListener("input", function () {
    var textLength = desc.value.length;
    text.textContent = textLength + "/" + limit;

    if (textLength > limit) {
        this.classList.add('error');
        desc.style.borderColor = "#ff2851";
        text.style.color = "#ff2851";

    } else {
        this.classList.remove('error');
        desc.style.borderColor = "#b2b2b2";
        text.style.color = "#737373";
    }
});

