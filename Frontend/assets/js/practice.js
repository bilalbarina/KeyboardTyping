const apiEndpoint = "http://localhost:8000/api/";
const username = window.localStorage.getItem("username");
const timerLimit = 10;
var typedText = "";
var wordsPerMinute = 0;

document.onkeydown = function (e) {
    const pressedKey = e.key;
    const textBox = document.getElementById("text-box");
    const regEx = new RegExp(
        `^(${typedText.length == 0 ? pressedKey : typedText + pressedKey})`
            .replaceAll(".", "\\.")
            .replaceAll("?", "\\?")
    );

    if (textBox.innerText.match(regEx)) {
        if (pressedKey == " ") {
            wordsPerMinute += 1;
            document.getElementById("score").innerText = wordsPerMinute;
        }
        document
            .getElementById(`key-${pressedKey.toLowerCase()}`)
            .classList.add("bg-green-400");
        textBox.innerHTML = textBox.innerText.replace(
            regEx,
            '<span class="text-green-600 border-b border-green-600">$1</span>'
        );
        typedText += pressedKey;

        if (textBox.innerText == typedText) {
            wordsPerMinute += 1;
            document.getElementById("score").innerText = wordsPerMinute;
            getRandomText();
            typedText = "";
        }
    } else {
        try {
            document
                .getElementById(`key-${pressedKey.toLowerCase()}`)
                .classList.add("bg-red-500");
        } catch (e) { }
    }
};

document.onkeyup = () => {
    document.querySelectorAll("[keyboard-key]").forEach((elem) => {
        elem.classList.remove("bg-green-400", "bg-red-500");
    });
};

window.onload = () => {
    getRandomText();
    document
        .getElementById("start-button")
        .addEventListener("click", () => {
            document.getElementById("start-modal").classList.add("hidden");
            document.getElementById('timer').innerText = timerLimit;
            interval = setInterval(() => {
                if (document.getElementById("timer").innerText == 0) {
                    document.getElementById("result-modal").classList.remove("hidden");
                    document.getElementById("words-per-minute").innerText =
                        wordsPerMinute;
                    updateScore(username, wordsPerMinute);
                    clearInterval(interval);
                } else {
                    document.getElementById("timer").innerText -= 1;
                }
            }, 1000);
        });

    document.getElementById('tryagain-button').addEventListener('click', () => {
        getRandomText();
        document.getElementById('result-modal').classList.add('hidden');
        document.getElementById('start-modal').classList.remove('hidden');
    });
};

function updateScore(username, wordsPerMinute) {
    $.ajax(apiEndpoint + "update-score", {
        method: "POST",
        data: {
            username: username,
            words_per_minute: wordsPerMinute,
        },
    });
}

function getRandomText() {
    const textBox = document.getElementById("text-box");
    fetch("https://api.quotable.io/random")
        .then((res) => res.json())
        .then(
            (json) => (textBox.innerText = json.content)
        );
}

function countWords(str) {
    const arr = str.split(" ");
    console.log(arr.filter((word) => word !== "").length);
    return arr.filter((word) => word !== "").length;
}
