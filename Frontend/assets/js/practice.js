const apiEndpoint = "http://localhost:8000/api/";
const username = window.localStorage.getItem("username");
const timerLimit = 10;
var typedText = "";
var wordsPerMinute = 0;

// Listen for key down
document.onkeydown = function (e) {
  const pressedKey = e.key;
  const textBox = document.getElementById("text-box");
  // Regex expression
  const regexText = (
    typedText.length == 0 ? pressedKey : typedText + pressedKey
  )
    .replaceAll(".", "\\.")
    .replaceAll("?", "\\?");
  const regEx = new RegExp(`^(${regexText})`);

  // Check if pressed key present in the text box
  if (textBox.innerText.match(regEx)) {
    // Increase words count if the pressed key is a space
    if (pressedKey == " ") {
      wordsPerMinute += 1;
      document.getElementById("score").innerText = wordsPerMinute;
    }

    // Add a green color to the pressed key
    document
      .getElementById(`key-${pressedKey.toLowerCase()}`)
      .classList.add("bg-green-400");

    // Make the correct typed text have a green color and a bottom border
    textBox.innerHTML = textBox.innerText.replace(
      regEx,
      '<span class="text-green-600 border-b border-green-600">$1</span>'
    );

    typedText += pressedKey;

    // Check if the typed text equal to the text box
    if (textBox.innerText == typedText) {
      wordsPerMinute += 1;
      document.getElementById("score").innerText = wordsPerMinute;

      // Change text box to a new one
      getRandomText();
      typedText = "";
    }
  } else {
    // Wrong key pressed
    try {
      // Add a red color to the pressed key
      document
        .getElementById(`key-${pressedKey.toLowerCase()}`)
        .classList.add("bg-red-500");
    } catch (e) {}
  }
};

// Listen for key up
document.onkeyup = () => {
  // Remove all key's color
  document.querySelectorAll("[keyboard-key]").forEach((elem) => {
    elem.classList.remove("bg-green-400", "bg-red-500");
  });
};

window.onload = () => {
  getRandomText();

  // Start button clicked
  document.getElementById("start-button").addEventListener("click", () => {
    document.getElementById("start-modal").classList.add("hidden");
    document.getElementById("timer").innerText = timerLimit;
    interval = setInterval(() => {
      if (document.getElementById("timer").innerText == 0) {
        document.getElementById("result-modal").classList.remove("hidden");
        document.getElementById("words-per-minute").innerText = wordsPerMinute;
        if (username) {
          updateScore(username, wordsPerMinute);
        }
        clearInterval(interval);
      } else {
        document.getElementById("timer").innerText -= 1;
      }
    }, 1000);
  });

  // Try again button clicked
  document.getElementById("tryagain-button").addEventListener("click", () => {
    typedText = "";
    wordsPerMinute = 0;
    getRandomText();
    document.getElementById("score").innerText = 0;
    document.getElementById("result-modal").classList.add("hidden");
    document.getElementById("start-modal").classList.remove("hidden");
  });
};

function updateScore(username, wordsPerMinute) {
  $.ajax(apiEndpoint + "update-score", {
    method: "PUT",
    data: {
      username: username,
      words_per_minute: wordsPerMinute,
    },
  });
}

// Get random text from API
function getRandomText() {
  const textBox = document.getElementById("text-box");
  fetch("https://api.quotable.io/random?maxLength=120&tags=technology")
    .then((res) => res.json())
    .then((json) => (textBox.innerText = json.content));
}

function countWords(str) {
  const arr = str.split(" ");
  console.log(arr.filter((word) => word !== "").length);
  return arr.filter((word) => word !== "").length;
}

function showLeaderboard() {
  $.ajax(apiEndpoint + "leaderboard", {
    jsonp: true,
    success: (data) => {
      let leaderboardList = document.getElementById("leaderboard-list");
      leaderboardList.innerHTML = "";
      console.log(data.scores);
      Object.values(data.scores).forEach((score) => {
        leaderboardList.innerHTML += `<li class="px-4 py-1 text-center border border-black rounded-md flex justify-between w-full">
		  <div>
			  ${score.username}
		  </div>
		  <div>
			  ${score.words_per_minute}
		  </div>
	  </li>`;
      });
      if (data.scores.length == 0) {
        leaderboardList.innerText = "No score yet";
      }
    },
  });
  document.getElementById("leaderboard-modal").classList.remove("hidden");
}
