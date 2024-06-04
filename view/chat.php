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
Username: <input type="text" id="username">
</label>
<label>
Message: <input type="text" id="message">
</label>
<script >
const chat = document.querySelector("#chat");
const message = document.querySelector("#message");
const username = document.querySelector("#username");

function readChat() {
  fetch("read")
    .then((res) => res.json())
    .then((data) => {
      // Format messages so the username appears above the content
      chat.value = data.map(message => `${message.username}\n${message.content}`).join("\n\n");
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
      body: `text=${encodeURIComponent(message.value)}&username=${encodeURIComponent(username.value)}`,
    });
    message.value = "";
    username.value = "";
  }
});

</script>

</body>
</html>
