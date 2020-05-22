(w => {
  const is = (value, match) => value === match;

  const getConversionLabel = label => (is(label, "C") ? "F" : "C");

  const getFarenheit = value => {
    return value * 1.8 + 32;
  };

  const getCentigrades = value => {
    return (value - 32) / 1.8;
  };

  const getTemperature = (value, scale) => {
    const result = is(scale, "C") ? getFarenheit(value) : getCentigrades(value);

    return `${value}°${scale} son ${result.toFixed(2)}°${getConversionLabel(
      scale
    )}`;
  };

  const days = {
    [0]: ["Domingo", "Sunday"],
    [1]: ["Lunes", "Monday"],
    [2]: ["Martes", "Tuesday"],
    [3]: ["Mi\u00E9rcoles", "Wednesday"],
    [4]: ["Jueves", "Thursday"],
    [5]: ["Viernes", "Friday"],
    [6]: ["Sábado", "Saturday"]
  };

  const getDate = selectedDate => {
    const parsedDate = new Date(selectedDate);
    const dayIndex = parsedDate.getUTCDay();
    const [esDay, enDay] = days[dayIndex];

    return `La fecha (${parsedDate.toLocaleDateString()}) es un ${esDay}/${enDay}.`;
  };

  w.Process = { getTemperature, getDate };
})(window);

(w => {
  const createCell = content => {
    const $td = $("<td>");
    $td.text(content);
    return $td;
  };

  const createLogRow = contents => {
    const $tr = $("<tr>");
    const nodes = contents.map(createCell);
    $tr.append(nodes);

    return $tr;
  };

  const setupLogger = (container, actions) => {
    return actions.map(action => {
      return result => {
        container.prepend(createLogRow([action, result]));
      };
    });
  };

  w.Helpers = { setupLogger };
})(window);
