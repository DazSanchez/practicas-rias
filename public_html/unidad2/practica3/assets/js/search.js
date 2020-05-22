(w => {
  const createCell = data => {
    const $td = $("<td>");
    $td.text(data);
    return $td;
  };

  const createRow = patient => {
    const $tr = $("<tr>");
    $tr.append(createCell(patient.id));
    $tr.append(createCell(patient.name));
    $tr.append(createCell(patient.firstSurname));
    $tr.append(createCell(patient.secondSurname));

    return $tr;
  };

  const onRequestResponse = response => {
    const rows = response.map(createRow);

    const $tbody = $("#tbody");
    $tbody.empty();
    $tbody.append(rows);
  };

  const onFormSubmit = e => {
    e.preventDefault();

    const filter_by = $("#filter-by").val();
    const q = $("#query").val();

    const $infoAlert = $("#infoAlert");
    const $table = $(".table-responsive");

    $.ajax("/api/controllers/search_patients.php", {
      contentType: "application/json",
      data: {
        filter_by,
        q
      },
      beforeSend: () => {
        $infoAlert.hide();
        $table.addClass("d-none");
      },
      dataType: "json",
      success: response => {
        if (!response.length) {
          $infoAlert.show();
        } else {
          onRequestResponse(response);
          $table.removeClass("d-none");
        }
      },
      error: ({ responseJSON }) => {
        alert(`Error: ${responseJSON.message}`);
      }
    });
  };

  const onLogout = () => {
    $.ajax("/api/controllers/logout.php", {
      method: "POST",
      success: () => {
        w.location.href = "/index.php";
      }
    });
  };

  $(document).ready(() => {
    $("#searchForm").submit(onFormSubmit);
    $("#logout").click(onLogout);
  });
})(window);
