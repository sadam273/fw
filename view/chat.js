const chat = document.querySelector("#chat");
const message = document.querySelector("#message");

function readChat() {
  // fetch("controller/Home.php?action=read")
  //   .then((res) => res.text())
  //   .then((data) => {
  //     chat.value = data;
  //   });
  // setTimeout(readChat, 1000);
  console.log("KONTOL");
}
readChat();

// message.addEventListener("keyup", (e) => {
//   if (e.keyCode === 13) {
//     fetch("controller/Home.php", {
//       method: "post",
//       headers: {
//         "Content-Type": "application/x-www-form-urlencoded",
//       },
//       body: `text=${message.value}`,
//     });
//     message.value = "";
//   }
// });
