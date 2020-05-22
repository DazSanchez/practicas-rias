Ext.require(['Ext.plugin.Viewport']);

Ext.onReady(function () {
  Ext.define('Paciente', {
    extend: 'Ext.data.Model',
    fields: [
      { name: 'idPaciente', type: 'int' },
      { name: 'name', type: 'string' },
      { name: 'firstSurname', type: 'string' },
      { name: 'secondSurname', type: 'string' },
    ],
  });

  const storePacientes = Ext.create('Ext.data.Store', {
    storeId: 'pacientesStore',
    model: 'Paciente',
    autoLoad: false,
    autoSync: false,
    proxy: {
      type: 'ajax',
      url: '/api/controller/patients.php',
      reader: {
        type: 'json',
        rootProperty: 'data',
      },
    },
  });

  const panel = Ext.create('Ext.panel.Panel', {
    renderTo: Ext.get('list'),
    title: 'Listado de pacientes',
    bodyPadding: 10,
    items: [
      {
        xtype: 'grid',
        store: storePacientes,
        columns: [
          {
            text: 'Id',
            dataIndex: 'idPaciente',
            sortable: false,
            hideable: false,
          },
          {
            text: 'Nombre',
            dataIndex: 'name',
            sortable: false,
            hideable: false,
          },
          {
            text: 'Ap Paterno',
            dataIndex: 'firstSurname',
            sortable: false,
            hideable: false,
          },
          {
            text: 'Ap Materno',
            dataIndex: 'secondSurname',
            sortable: false,
            hideable: false,
          },
        ],
      },
    ],
  });

  // panel.hide();

  Ext.create('Ext.form.Panel', {
    renderTo: Ext.get('login'),
    title: 'Ingreso al sistema',
    bodyPadding: 10,
    width: '300px',
    hideMode: 'display',
    layout: {
      type: 'form',
    },
    standardSubmit: false,
    url: '/api/controller/login.php',
    jsonSubmit: true,
    defaultType: 'textfield',
    defaults: {
      allowBlank: false,
      blankText: 'Este campo es requerido',
    },
    items: [
      {
        fieldLabel: 'Usuario',
        name: 'username',
      },
      {
        fieldLabel: 'Contrase\u00F1a',
        inputType: 'password',
        name: 'password',
      },
    ],
    buttons: [
      {
        text: 'Ingresar',
        handler: function () {
          const form = this.up('form').getForm();
          if (!form.isValid()) return;

          form.submit({
            success: function (_form, action) {
              const login = Ext.get('login');
              login.setVisibilityMode(Ext.Element.DISPLAY);
              login.hide();
              login.removeCls('open');

              panel.show();

              storePacientes.load();
            },
            failure: function (_form, action) {
              switch (action.failureType) {
                case Ext.form.action.Action.CONNECT_FAILURE:
                  const response = JSON.parse(action.response.responseText);
                  Ext.Msg.alert('Error en la petici\u00F3n', response.message);
                  break;
                default:
                  Ext.Msg.alert('Error', 'Ha ocurrido un error');
                  break;
              }
            },
          });
        },
      },
    ],
  });
});
