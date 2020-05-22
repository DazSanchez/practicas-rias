const setup = () => {
  $("#fNacimiento").datepicker({
    dateFormat: "dd/mm",
    maxDate: new Date()
  });

  $("#fIngreso").datepicker({
    dateFormat: "dd/mm/yy",
    maxDate: new Date()
  });

  bsCustomFileInput.init();

  $("input[type='checkbox']").checkboxradio({
    icon: false
  });

  $("#color").spectrum({
    preferredFormat: "hex"
  });
};

const getValues = controls => {
  return controls.reduce(
    (res, control) => ({ [control]: $(`#${control}`).val(), ...res }),
    {}
  );
};

$(document).ready(() => {
  setup();

  const textInputs = [
    "name",
    "aPaterno",
    "aMaterno",
    "fNacimiento",
    "color",
    "aInteres",
    "email",
    "password",
    "url",
    "fIngreso"
  ];

  const cols = [
    "name",
    "aPaterno",
    "aMaterno",
    "fNacimiento",
    "color",
    "picture",
    "aInteres",
    "email",
    "password",
    "url",
    "pasatiempos",
    "fIngreso"
  ];

  const $tbody = $("#tbody");
  const $registerForm = $("#registerForm");

  $registerForm.submit(e => {
    e.preventDefault();

    const $checkboxes = $("input[type='checkbox']:checked");

    if (!$checkboxes.length) {
      alert("Debe selecionar al menos un pasatiempo");
      return;
    }

    const currentValue = getValues(textInputs);

    const picture = $("#picture").prop("files")[0].name;

    const pasatiempos = $checkboxes
      .map(function() {
        return this.value;
      })
      .get()
      .join(",");

    const formValue = {
      ...currentValue,
      picture,
      pasatiempos
    };

    const $tr = $("<tr>");
    cols.forEach(col => {
      const $td = $("<td>");
      $td.text(formValue[col]);
      $td.appendTo($tr);
    });

    $tbody.append($tr);

    $registerForm.trigger("reset");
  });
});
