let currentPlayer = "X";
let gameEnded = false;

function makeMove(cellIndex) {
    const cell = document.getElementsByClassName("cell")[cellIndex];

    if (cell.innerHTML === "" && !gameEnded) {
        cell.innerHTML = currentPlayer;
        cell.style.color = currentPlayer === "X" ? "red" : "blue";
        currentPlayer = currentPlayer === "X" ? "O" : "X";

        if (checkWin()) {
            endGame(`Parabéns! Jogador ${currentPlayer === "X" ? "O" : "X"} venceu!`);
        } else if (checkTie()) {
            endGame("Empate! O jogo terminou sem vencedor.");
        }
    }
}

function checkWin() {
    const winningCombinations = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];

    const cells = document.getElementsByClassName("cell");

    for (const combination of winningCombinations) {
        const [a, b, c] = combination;
        if (
            cells[a].innerHTML !== "" &&
            cells[a].innerHTML === cells[b].innerHTML &&
            cells[a].innerHTML === cells[c].innerHTML
        ) {
            return true;
        }
    }

    return false;
}

function checkTie() {
    const cells = document.getElementsByClassName("cell");
    for (const cell of cells) {
        if (cell.innerHTML === "") {
            return false;
        }
    }
    return true;
}

function endGame(message) {
    gameEnded = true;
    const successMessage = document.getElementById("successMessage");
    successMessage.innerHTML = message;
}


function resetGame() {
    const cells = document.getElementsByClassName("cell");

    Array.from(cells).forEach((cell) => {
        cell.innerHTML = "";
        cell.style.color = "black";
    });

    currentPlayer = "X";
    gameEnded = false;
}
