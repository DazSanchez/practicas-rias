const { getTemperature, getDate } = window.Process;
const { setupLogger } = window.Helpers;

const setupConversionForm = log => {
  const $form = $("#conversionForm");
  const $input = $("#input");

  $form.on("submit", e => {
    e.preventDefault();
    const temp = $input.val();
    const scale = $("[name='scale']:checked").val();

    const message = getTemperature(temp, scale);
    alert(message);
    log(message);
  });
};

const setupDatepicker = log => {
  const $datepicker = $("#datepicker");
  $datepicker.on("change", () => {
    const selectedDate = $datepicker.val();
    const message = getDate(selectedDate);
    alert(message);
    log(message);
  });
};

$(document).ready(() => {
  const [cLog, sfLog] = setupLogger($("#tableBody"), [
    "Conversi\u00F3n",
    "Selecci\u00F3n de fecha"
  ]);
  setupConversionForm(cLog);
  setupDatepicker(sfLog);
});
