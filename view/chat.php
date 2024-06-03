<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
</head>
<body>

<textarea id="chat" rows="20" cols="31" readonly></textarea><br>
<label>
Message: <input type="text" id="message">
</label>
<script >
  const chat = document.querySelector("#chat");
const message = document.querySelector("#message");

function readChat() {
  fetch("read")
    .then((res) => res.text())
    .then((data) => {
      chat.value = data;
    });
  setTimeout(readChat, 1000);
}
readChat();

message.addEventListener("keyup", (e) => {
  if (e.keyCode === 13) {
    fetch("submit", {
      method: "post",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `text=${message.value}`,
    });
    message.value = "";
  }
});

</script>

</body>
</html>
