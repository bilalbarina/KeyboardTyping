document.onkeydown = function (e) {
    const pressedKey = e.key;
    const textBox = document.getElementById("text-box");
    const regEx = new RegExp(
        `^(${!window.typedText ? pressedKey : window.typedText + pressedKey})`.replaceAll('.', '\\.').replaceAll('?', '\\?')
    );
    
    if (textBox.innerText.match(regEx)) {
        document
            .getElementById(`key-${pressedKey.toLowerCase()}`)
            .classList.add("bg-green-400");
        textBox.innerHTML = textBox.innerText.replace(
            regEx,
            '<span class="text-green-600 border-b border-green-600">$1</span>'
        );
        if (!window.typedText) {window.typedText = '';}
        window.typedText += pressedKey;

        if (textBox.innerText == window.typedText) {
            getRandomText();
            window.typedText = '';
        }
    } else {
        try {
            document
            .getElementById(`key-${pressedKey.toLowerCase()}`)
            .classList.add("bg-red-500");
        } catch (e) {}
    }
};

document.onkeyup = () => {
    document.querySelectorAll("[keyboard-key]").forEach((elem) => {
        elem.classList.remove("bg-green-400", "bg-red-500");
    });
};

window.onload = () => {
    setInterval(() => document.getElementById('timer').innerText == 0 ?clearInterval(this): document.getElementById('timer').innerText -= 1, 1000)
    getRandomText();
};

function getRandomText() {
    fetch('https://api.quotable.io/random')
    .then((data) => data.json())
    .then((json) => document.getElementById('text-box').innerText = json.content)
}