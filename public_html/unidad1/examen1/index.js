const select = selector => document.querySelector(selector);

const valueGetter = element => {
  return () => {
    return element.value;
  };
};

const onFormSubmit = (form, handler) => {
  form.addEventListener("submit", e => {
    e.preventDefault();
    handler(e);
  });
};

const htmlSetter = element => {
  return value => {
    element.innerHTML = value;
  };
};

const parseRequest = body => {
  return Object.entries(body)
    .map(([key, value]) => `${key}=${value}`)
    .join("&");
};

const request = ({ url, body }) => {
  return new Promise((resolve, reject) => {
    const request = new XMLHttpRequest();
    request.onreadystatechange = () => {
      if (request.readyState != 4) return;

      const response = JSON.parse(request.responseText);

      if (response.code == 200) {
        resolve(response);
      } else {
        reject(response);
      }
    };
    request.open("POST", url, true);
    request.setRequestHeader("Accept", "application/json");
    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    request.send(body);
  });
};

const setupForm = form => {
  const getDate = valueGetter(select("#date"));
  const getNumber = valueGetter(select("#number"));
  const responseContainer = htmlSetter(select("#response"));

  onFormSubmit(form, () => {
    const date = getDate();
    const num = getNumber();

    const body = parseRequest({ date, num });

    request({
      url: "/controller.php",
      body
    })
      .then(({ message }) => {
        responseContainer(`Nombre: ${message.name} - Suma: ${message.num}`);
      })
      .catch(err => {
        alert(`Ha ocurrido un error en la petición: ${err.message}`);
      });
  });
};

document.addEventListener("DOMContentLoaded", () => {
  setupForm(select("#form"));
});
