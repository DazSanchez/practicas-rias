Ext.require(['Ext.plugin.Viewport']);

Ext.namespace(
  'App',
  'App.store',
  'App.model',
  'App.component',
  'App.controller'
);

// *** UserModel ***
Ext.define('App.model.User', {
  extends: 'Ext.data.Model',
  alias: 'model.user',
  fields: [
    {
      name: 'name',
      type: 'string',
    },
    {
      name: 'firstSurname',
      type: 'string',
    },
    {
      name: 'secondSurname',
      type: 'string',
    },
    {
      name: 'birthdate',
      type: 'date',
    },
    {
      name: 'color',
      type: 'string',
    },
    {
      name: 'picture',
      type: 'string',
    },
    {
      name: 'interestId',
      type: 'string',
      reference: 'App.model.Interest',
    },
    {
      name: 'email',
      type: 'string',
    },
    {
      name: 'password',
      type: 'string',
    },
    {
      name: 'webpage',
      type: 'string',
    },
    {
      name: 'hobbiesIds',
      type: 'auto',
    },
    {
      name: 'joinDate',
      type: 'date',
    },
  ],
});
// *** End UserModel ***

//*** InterestStore ***
App.store.interest = Ext.create('Ext.data.Store', {
  storeId: 'interestStore',
  data: [{ name: 'Humanidades' }, { name: 'Ciencias exactas' }],
});
//*** End InterestStore ***

//*** HobbyStore ***
App.store.hobby = Ext.create('Ext.data.Store', {
  storeId: 'hobbyStore',
  data: [
    { name: 'Realizar deportes' },
    { name: 'Jugar videojuegos' },
    { name: 'Escuchar música' },
    { name: 'Otro' },
  ],
});
//*** End HobbyStore ***

// *** UserStore ***
App.store.user = Ext.create('Ext.data.Store', {
  storeId: 'userStore',
  data: [],
});
// *** End UserStore ***

// *** UserFormPanel ***
App.controller.userFormController = Ext.create('Ext.app.ViewController', {
  onSubmit: function () {
    const form = this.lookupReference('userForm');

    if (!form.isValid()) {
      Ext.Msg.alert('Formulario inválido', 'Algunos campos contienen errores');
      return;
    }

    const picture = this.lookupReference('fileInput').fileInputEl.dom.files[0]
      .name;
    const values = form.getValues();

    const user = App.model.User({
      ...values,
      picture,
    });

    App.store.user.add(user);
    form.reset();
  },
});

App.component.userFormPanel = Ext.create('Ext.panel.Panel', {
  controller: App.controller.userFormController,

  title: 'Registro de usuario',

  requires: ['Ext.ux.colorpick.Field'],

  items: [
    {
      xtype: 'form',
      reference: 'userForm',
      layout: 'column',
      padding: '10 15',
      defaultButton: 'submitButton',
      defaults: {
        allowBlank: false,
        blankText: 'Este campo es requerido',
        labelAlign: 'top',
        columnWidth: 1,
      },
      items: [
        {
          xtype: 'textfield',
          name: 'name',
          fieldLabel: 'Name*',
        },
        {
          xtype: 'textfield',
          name: 'firstSurname',
          fieldLabel: 'A. Paterno*',
        },
        {
          xtype: 'textfield',
          name: 'secondSurname',
          fieldLabel: 'A. Materno*',
        },
        {
          xtype: 'textfield',
          name: 'webpage',
          fieldLabel: 'Página web personal*',
          vtype: 'url',
          emptyText: 'http://www.google.com',
        },
        {
          xtype: 'datefield',
          name: 'birthdate',
          fieldLabel: 'Fecha de nacimiento*',
          maxValue: new Date(),
          format: 'd/m',
        },
        {
          xtype: 'colorfield',
          name: 'color',
          fieldLabel: 'Color*',
        },
        {
          xtype: 'filefield',
          name: 'picture',
          fieldLabel: 'Fotografía*',
          buttonText: 'Seleccionar',
          reference: 'fileInput',
          accept: 'image/*',
        },
        {
          xtype: 'combobox',
          fieldLabel: 'Área de interés*',
          name: 'interestId',
          store: App.store.interest,
          queryMode: 'local',
          displayField: 'name',
          valueField: 'id',
        },
        {
          xtype: 'textfield',
          name: 'email',
          fieldLabel: 'Correo electrónico*',
          vtype: 'email',
          emptyText: 'ejemplo@gmail.com',
        },
        {
          xtype: 'textfield',
          name: 'password',
          fieldLabel: 'Contraseña*',
          inputType: 'password',
          regex: /\d{2}_[A-Z]{2}\d[a-z]/,
          regexText:
            'Debe ingresar 2 números, un guión bajo, 2 letras mayúsculas, un número y una letra minúscula',
        },
        {
          xtype: 'checkboxgroup',
          fieldLabel: 'Pasatiempos*',
          defaultType: 'checkboxfield',
          blankText: 'Seleccione almenos uno',
          columns: 2,
          vertical: true,
          items: App.store.hobby.getRange().map(({ data }) => ({
            boxLabel: data.name,
            name: 'hobbiesIds',
            inputValue: data.id,
          })),
        },
        {
          xtype: 'datefield',
          name: 'joinDate',
          fieldLabel: 'Fecha de ingreso a la educación superior*',
          margin: '0 0 10 0',
          maxValue: new Date(),
        },
      ],
    },
  ],

  buttons: [
    {
      text: 'Registrar',
      reference: 'submitButton',
      handler: 'onSubmit',
    },
  ],

  buttonAlign: 'right',

  width: '20%',
});
// *** End UserFormPanel ***

// *** UserTablePanel ***
App.component.userTablePanel = Ext.create('Ext.panel.Panel', {
  title: 'Usuarios registrados',

  items: [
    {
      xtype: 'grid',
      store: App.store.user,
      columns: [
        {
          text: 'Nombre',
          dataIndex: 'name',
        },
        {
          text: 'A. Paterno',
          dataIndex: 'firstSurname',
        },
        {
          text: 'A. Materno',
          dataIndex: 'secondSurname',
        },
        {
          text: 'Página web',
          dataIndex: 'webpage',
        },
        {
          text: 'Fecha de nacimiento',
          dataIndex: 'birthdate',
        },
        {
          text: 'Color',
          dataIndex: 'color',
        },
        {
          text: 'Fotografía',
          dataIndex: 'picture',
        },
        {
          text: 'Área de interés',
          dataIndex: 'interestId',
          renderer: function (id) {
            const { data } = App.store.interest.getById(id);
            return data.name;
          },
        },
        {
          text: 'Correo',
          dataIndex: 'email',
        },
        {
          text: 'Contraseña',
          dataIndex: 'password',
        },
        {
          text: 'Pasatiempos',
          dataIndex: 'hobbiesIds',
          renderer: function (ids) {
            if (Array.isArray(ids)) {
              return ids
                .map(id => {
                  const { data } = App.store.hobby.getById(id);
                  return data.name;
                })
                .join(',');
            }

            const { data } = App.store.hobby.getById(ids);
            return data.name;
          },
        },
        {
          text: 'Fecha de ingreso',
          dataIndex: 'joinDate',
        },
      ],
    },
  ],
  width: '80%',
});
// *** End UserTablePanel ***

// *** Application ***
Ext.application({
  name: 'practica2',
  launch: function () {
    Ext.create('Ext.Container', {
      renderTo: Ext.getBody(),
      items: [
        {
          xtype: 'container',
          layout: {
            type: 'hbox',
          },
          items: [App.component.userFormPanel, App.component.userTablePanel],
        },
      ],
    });
  },
});
// *** End Application ***
