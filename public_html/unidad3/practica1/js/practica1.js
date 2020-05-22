Ext.require(["Ext.plugin.Viewport", "Ext.form.field.Radio"]);

Ext.namespace("App");

App.days = {
  [0]: ["Domingo", "Sunday"],
  [1]: ["Lunes", "Monday"],
  [2]: ["Martes", "Tuesday"],
  [3]: ["Mi\u00E9rcoles", "Wednesday"],
  [4]: ["Jueves", "Thursday"],
  [5]: ["Viernes", "Friday"],
  [6]: ["Sábado", "Saturday"]
};

App.methods = {
  getFarenheit: function(value) {
    return value * 1.8 + 32;
  },
  getCentigrades: function(value) {
    return (value - 32) / 1.8;
  },
  getScale: function(current) {
    return current === "F" ? "C" : "F";
  }
};

// *** Store ***
const store = Ext.create("Ext.data.Store", {
  fields: [
    {
      name: "action",
      type: "string"
    },
    {
      name: "result",
      type: "string"
    }
  ],
  storeId: "recordStore",
  data: []
});
// *** End Store ***

// *** ConversionForm ***
Ext.define("practica1.ConversionFormViewController", {
  extend: "Ext.app.ViewController",
  alias: "controller.conversionformview",

  control: {
    "#submitButton": {
      click: "onFormSubmit"
    }
  },

  onFormSubmit: function() {
    const form = this.lookupReference("conversionForm");

    if (!form.isValid()) return;

    const { ctype, val } = form.getValues();

    const scale = App.methods.getScale(ctype);
    const converted =
      ctype === "F"
        ? App.methods.getFarenheit(val)
        : App.methods.getCentigrades(val);

    const result = `${val}°${scale} son ${converted.toFixed(2)}°${ctype}`;

    Ext.Msg.alert("Resultado", result);

    store.add({
      action: "Conversi\u00F3n",
      result
    });

    form.reset();
  }
});

const conversionForm = Ext.create("Ext.Container", {
  controller: "conversionformview",
  items: [
    {
      xtype: "form",
      title: "Conversi\u00F3n",
      margin: 15,
      reference: "conversionForm",
      layout: {
        type: "form"
      },
      items: [
        {
          xtype: "fieldcontainer",
          fieldLabel: "Operaciones",
          labelAlign: "top",
          defaultType: "radiofield",
          layout: "vbox",
          items: [
            {
              boxLabel: "°C a °F",
              name: "ctype",
              inputValue: "F",
              checked: true
            },
            {
              boxLabel: "°F a °C",
              name: "ctype",
              inputValue: "C"
            }
          ]
        },
        {
          xtype: "numberfield",
          name: "val",
          fieldLabel: "Valor de entrada",
          labelAlign: "top",
          allowBlank: false
        },
        {
          xtype: "button",
          text: "Calcular",
          id: "submitButton"
        }
      ]
    }
  ],
  width: "50%"
});
// *** End ConversionForm ***

// *** DateForm ***
Ext.define("practica1.DateFormViewController", {
  extend: "Ext.app.ViewController",
  alias: "controller.dateformview",

  control: {
    "#date": {
      change: "onDateChange"
    }
  },

  onDateChange: function(_, newDate) {
    const day = newDate.getUTCDay();
    const [esDay, enDay] = App.days[day];

    const result = `La fecha (${newDate.toLocaleDateString()}) es un ${esDay}/${enDay}.`;

    Ext.Msg.alert("Resultado", result);

    store.add({
      action: "Selecci\u00F3n de fecha",
      result
    });
  }
});

const dateForm = Ext.create("Ext.Container", {
  controller: "dateformview",
  items: [
    {
      xtype: "form",
      title: "Selecci\u00F3n de fecha",
      margin: 15,
      items: [
        {
          xtype: "datefield",
          format: "d/m/Y",
          fieldLabel: "Seleccione una fecha",
          labelAlign: "top",
          id: "date",
          padding: "0 15"
        }
      ]
    }
  ],
  width: "50%"
});
// *** End DateForm ***

// *** TablePanel ***
const tablePanel = Ext.create("Ext.panel.Panel", {
  title: "Historial de conversiones",
  margin: 15,
  items: [
    {
      xtype: "grid",
      store,
      columns: [
        {
          text: "Acci\u00F3n",
          dataIndex: "action",
          width: 200
        },
        {
          text: "Resultado",
          dataIndex: "result",
          width: 500
        }
      ],
      layout: "fit"
    }
  ]
});
// *** End TablePanel ***

// *** Application ***
Ext.application({
  name: "practica1",
  launch: function() {
    Ext.create("Ext.Container", {
      renderTo: Ext.getBody(),
      items: [
        {
          xtype: "container",
          layout: {
            type: "hbox"
          },
          items: [conversionForm, dateForm]
        },
        tablePanel
      ]
    });
  }
});
// *** End Application ***
