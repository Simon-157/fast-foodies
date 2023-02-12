document.form.addEventListener("submit", async function (event) {
  event.preventDefault();
  const form = event.target;
  const result = await fetch(form.action, {
    method: form.method,
    body: new URLSearchParams([...new FormData(form)]),
  })
    .then((response) => response.json())
    .then((json) => json)
    .catch((error) => console.log(error));
});
