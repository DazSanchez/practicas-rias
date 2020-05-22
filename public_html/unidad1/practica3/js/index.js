const select = selector => document.querySelector(selector);
const byName = name => document.getElementsByName(name);
const create = (tag, content) => {
  const el = document.createElement(tag);
  if (content) {
    el.innerHTML = content;
  }
  return el;
};

const is = (value, match) => value === match;

const getConversionLabel = label => (is(label, "C") ? "F" : "C");

const getFarenheit = value => {
  return value * 1.8 + 32;
};

const getCentigrades = value => {
  return (value - 32) / 1.8;
};

const valueSetter = element => {
  return value => {
    element.value = value;
  };
};

const valueGetter = element => {
  return () => {
    return element.value;
  };
};

const getChecked = elements => {
  return Array.from(elements.values()).find(e => e.checked).value;
};

const toggleVisibility = element => {
  return isVisible => {
    element.style.display = isVisible ? "block" : "none";
  };
};

const onFormSubmit = (form, handler) => {
  form.addEventListener("submit", e => {
    e.preventDefault();
    handler(e);
  });
};

const onValueChange = (input, handler) => {
  input.addEventListener("change", e => {
    handler(e.target.value);
  });
};

const htmlSetter = element => {
  return value => {
    element.innerHTML = value;
  };
};

const appendChilds = (element, childs) => {
  childs.forEach(child => {
    element.appendChild(child);
  });
};

const createRow = ({ action, result }) => {
  const row = create("tr");
  const actionColumn = create("td", action);
  const resultColumn = create("td", result);

  appendChilds(row, [actionColumn, resultColumn]);
  return row;
};

const setupLogger = container => {
  return action => {
    return result => {
      container.prepend(createRow({ action, result }));
    };
  };
};

const setupConversionForm = (form, log) => {
  const getInput = valueGetter(select("#input"));
  const toggleInvalidNumberLabel = toggleVisibility(select("#inputError"));

  onFormSubmit(form, () => {
    const operation = getChecked(byName("scale"));
    const input = getInput();
    toggleInvalidNumberLabel(false);

    if (isNaN(Number(input))) {
      toggleInvalidNumberLabel(true);
      return;
    }

    const value = parseFloat(input);

    const result = is(operation, "C")
      ? getFarenheit(value)
      : getCentigrades(value);

    const message = `${value}°${operation} son ${result}°${getConversionLabel(
      operation
    )}`;

    alert(message);
    log(message);
  });
};

const setupDatepicker = (input, log) => {
  const days = {
    [0]: ["Domingo", "Sunday"],
    [1]: ["Lunes", "Monday"],
    [2]: ["Martes", "Tuesday"],
    [3]: ["Miércoles", "Wednesday"],
    [4]: ["Jueves", "Thursday"],
    [5]: ["Viernes", "Friday"],
    [6]: ["Sábado", "Saturday"]
  };

  onValueChange(input, value => {
    if (!value) {
      return;
    }

    const parsedDate = new Date(value);
    const dayIndex = parsedDate.getUTCDay();
    const [esDay, enDay] = days[dayIndex];

    const message = `La fecha seleccionada es un ${esDay}/${enDay}.`;
    alert(message);
    log(message);
  });
};

document.addEventListener("DOMContentLoaded", () => {
  const actionLogger = setupLogger(select("#tableBody"));
  setupConversionForm(
    select("#conversionForm"),
    actionLogger("Conversi&oacute;n")
  );
  setupDatepicker(
    select("#datepicker"),
    actionLogger("Selecci&oacute;n de fecha")
  );
});
