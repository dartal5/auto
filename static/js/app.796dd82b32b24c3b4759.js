webpackJsonp([1],{

/***/ "7zck":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "NHnr":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });

// EXTERNAL MODULE: ./node_modules/vue/dist/vue.esm.js
var vue_esm = __webpack_require__("7+uW");

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/App.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var App = ({
  data: function data() {
    return {
      drawer: true,
      title: 'Car rent app',
      paramsModel: {
        status: null,
        make: null,
        class_type: null,
        train_type: null,
        type: null,
        fuel_type: null
      }
    };
  },

  computed: {
    links: function links() {
      if (this.$store.state.user.user) {
        return [{
          icon: 'home',
          title: 'Home',
          src: '/'
        }, {
          icon: 'business_center',
          title: 'My orders',
          src: '/orders'
        }, {
          icon: 'settings',
          title: 'settings',
          src: '/settings'
        }, {
          icon: 'account_box',
          title: 'Logout',
          src: '/Logout'
        }];
      } else {
        return [{
          icon: 'home',
          title: 'Home',
          src: '/'
        }, {
          icon: 'account_box',
          title: 'Register',
          src: '/register'
        }, {
          icon: 'account_box',
          title: 'Login',
          src: '/Login'
        }];
      }
    },
    cars: function cars() {
      return this.$store.getters.cars;
    },
    carParams: function carParams() {
      return this.$store.getters.carParams;
    },
    message: function message() {
      return this.$store.state.messages.message;
    },

    isVisibleMsg: {
      set: function set(val) {
        this.$store.commit('clearMessage');
      },
      get: function get() {
        return this.$store.state.messages.isVisibleMsg;
      }
    }

  },
  methods: {
    filterCars: function filterCars() {
      this.$router.push({ name: 'Home', query: this.paramsModel });
    },
    resetFilter: function resetFilter() {
      for (var prop in this.paramsModel) {
        this.paramsModel[prop] = null;
      }
      this.$router.push('/');
    },
    clearMessage: function clearMessage() {
      this.$store.commit('clearMessage');
    }
  },
  name: 'App'
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-2810f4c6","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/App.vue
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-app',[_c('v-navigation-drawer',{attrs:{"app":""},model:{value:(_vm.drawer),callback:function ($$v) {_vm.drawer=$$v},expression:"drawer"}},[_c('v-list',{staticClass:"mt-2"},[_c('v-list-tile',[_c('v-switch',{attrs:{"label":'Вільна зараз',"color":"red"},model:{value:(_vm.paramsModel.status),callback:function ($$v) {_vm.$set(_vm.paramsModel, "status", $$v)},expression:"paramsModel.status"}})],1),_vm._v(" "),_vm._l((_vm.carParams),function(car,name){return (name != 'price')?_c('v-list-tile',{key:name,staticClass:"mt-2"},[_c('v-select',{attrs:{"items":car,"label":name},model:{value:(_vm.paramsModel[name]),callback:function ($$v) {_vm.$set(_vm.paramsModel, name, $$v)},expression:"paramsModel[name]"}})],1):_vm._e()}),_vm._v(" "),_c('v-list-tile',[_c('v-btn',{staticClass:"error",on:{"click":_vm.resetFilter}},[_vm._v("\n          Очистити\n        ")]),_vm._v(" "),_c('v-btn',{staticClass:"info",on:{"click":_vm.filterCars}},[_vm._v("\n          Фільтр\n        ")])],1)],2)],1),_vm._v(" "),_c('v-toolbar',{staticClass:"primary",attrs:{"app":"","dark":""}},[_c('v-toolbar-side-icon',{on:{"click":function($event){$event.stopPropagation();_vm.drawer = !_vm.drawer}}}),_vm._v(" "),_c('v-toolbar-title',{domProps:{"textContent":_vm._s(_vm.title)}}),_vm._v(" "),_c('v-spacer'),_vm._v(" "),_vm._l((_vm.links),function(link){return _c('v-toolbar-items',{key:link.title,staticClass:"hidden-sm-and-down"},[_c('v-btn',{attrs:{"flat":"","to":link.src}},[_c('v-icon',{attrs:{"left":""}},[_vm._v(_vm._s(link.icon))]),_vm._v("\n        "+_vm._s(link.title)+"\n      ")],1)],1)})],2),_vm._v(" "),_c('v-content',[_c('router-view')],1),_vm._v(" "),_c('v-snackbar',{attrs:{"timeout":5000,"bottom":true,"multi-line":'multi-line',"vertical":'vertical'},model:{value:(_vm.isVisibleMsg),callback:function ($$v) {_vm.isVisibleMsg=$$v},expression:"isVisibleMsg"}},[_vm._v("\n    "+_vm._s(_vm.message)+"\n    "),_c('v-btn',{attrs:{"flat":"","color":"pink"},nativeOn:{"click":function($event){return _vm.clearMessage($event)}}},[_vm._v("Close")])],1),_vm._v(" "),_c('v-footer',{attrs:{"app":""}},[_c('span',[_vm._v("© 2017")])])],1)}
var staticRenderFns = []
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ var selectortype_template_index_0_src_App = (esExports);
// CONCATENATED MODULE: ./src/App.vue
var normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  App,
  selectortype_template_index_0_src_App,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)

/* harmony default export */ var src_App = (Component.exports);

// EXTERNAL MODULE: ./node_modules/vue-router/dist/vue-router.esm.js
var vue_router_esm = __webpack_require__("/ocq");

// EXTERNAL MODULE: ./node_modules/babel-runtime/core-js/object/keys.js
var keys = __webpack_require__("fZjL");
var keys_default = /*#__PURE__*/__webpack_require__.n(keys);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/Home.vue

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Home = ({
  computed: {
    cars: function cars() {
      var filterObj = this.$route.query;
      var cars = this.$store.getters.cars;
      if (keys_default()(filterObj).length !== 0) {
        cars = cars.filter(function (item) {
          for (var value in filterObj) {
            if (filterObj[value] !== null && filterObj[value] !== item[value]) {
              return false;
            }
          }
          return true;
        });
      }

      return cars;
    }
  }
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-a0fb3510","hasScoped":true,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/Home.vue
var Home_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-container',{attrs:{"grid-list-lg":"","fluid":""}},[_c('v-layout',{attrs:{"row":"","wrap":""}},_vm._l((_vm.cars),function(car){return _c('v-flex',{key:car.id,attrs:{"md3":""}},[_c('v-card',[_c('v-card-media',{attrs:{"src":car.picture,"height":"200px"}}),_vm._v(" "),_c('v-card-title',{attrs:{"primary-title":""}},[_c('div',[_c('h3',{},[_vm._v(_vm._s(car.make + ' ' + car.model))]),_vm._v(" "),_c('div',[_vm._v(_vm._s(car.info))])])]),_vm._v(" "),_c('v-card-actions',[_c('v-spacer'),_vm._v(" "),_c('v-btn',{attrs:{"to":'/car/' + car.id,"color":"success"}},[_vm._v("Замовити")])],1)],1)],1)}))],1)}
var Home_staticRenderFns = []
var Home_esExports = { render: Home_render, staticRenderFns: Home_staticRenderFns }
/* harmony default export */ var components_Home = (Home_esExports);
// CONCATENATED MODULE: ./src/components/Home.vue
function injectStyle (ssrContext) {
  __webpack_require__("O6Wo")
}
var Home_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var Home___vue_template_functional__ = false
/* styles */
var Home___vue_styles__ = injectStyle
/* scopeId */
var Home___vue_scopeId__ = "data-v-a0fb3510"
/* moduleIdentifier (server only) */
var Home___vue_module_identifier__ = null
var Home_Component = Home_normalizeComponent(
  Home,
  components_Home,
  Home___vue_template_functional__,
  Home___vue_styles__,
  Home___vue_scopeId__,
  Home___vue_module_identifier__
)

/* harmony default export */ var src_components_Home = (Home_Component.exports);

// EXTERNAL MODULE: ./node_modules/babel-runtime/core-js/json/stringify.js
var stringify = __webpack_require__("mvHQ");
var stringify_default = /*#__PURE__*/__webpack_require__.n(stringify);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/Cars/Car.vue

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Car = ({
  data: function data() {
    return {
      datePickerFrom: null,
      datePickerTo: null,
      selectPicker: null,
      errorMsg: false,
      valid: false,
      reqRule: [function (v) {
        return !!v || 'This field is required';
      }],
      dialog: false,
      selectItems: [{
        text: 'Оренда для розваг',
        value: 'entertainment'
      }, {
        text: 'Оренда для подорожі',
        value: 'travel'
      }, {
        text: 'Оренда для роботи',
        value: 'work'
      }, {
        text: 'Інше',
        value: 'other   '
      }]
    };
  },

  computed: {
    cars: function cars() {
      return this.$store.getters.cars;
    },
    carById: function carById() {
      var id = this.id;
      return this.cars.find(function (elem) {
        return elem.id === id;
      });
    },
    paramsToShow: function paramsToShow() {
      return this.$store.getters.paramsToShow;
    },
    minDate: function minDate() {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = '0' + dd;
      }

      if (mm < 10) {
        mm = '0' + mm;
      }

      today = yyyy + '-' + mm + '-' + dd; //format

      return today;
    }
  },
  methods: {
    onForm: function onForm() {
      if (this.$refs.form.validate() && this.datePickerFrom) {
        var user = this.$store.state.user.user;

        if (user) {
          var order = {
            action: 'step',
            step: 'calc',
            id: this.id,
            dateFrom: this.datePickerFrom,
            dateTo: this.datePickerTo
          };
          this.$store.dispatch('sendOrderStep1', order);
        } else {
          this.$store.commit('clearMessage');
          this.$store.commit('setMessage', 'Please, sign in to make an order');
        }
      } else {
        this.$store.commit('clearMessage');
        this.$store.commit('setMessage', 'Start date and purpose are required');
      }
    },
    sendOrder: function sendOrder() {
      var order = {
        id: this.id,
        dateFrom: this.datePickerFrom,
        dateTo: this.datePickerTo,
        name: this.name,
        email: this.email,
        driveCat: this.selectDrive.text,
        driveExp: this.selectExp.text,
        driveExp2: this.selectExp2.text
      };
      console.log(stringify_default()(order));
      this.dialog = false;
    }
  },
  props: ['id']
});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-85a7efb6","hasScoped":true,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/Cars/Car.vue
var Car_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-container',{attrs:{"grid-list-lg":"","fluid":""}},[_c('v-layout',{attrs:{"row":"","wrap":""}},[_c('v-flex',{attrs:{"sm12":""}},[_c('h1',{staticClass:"car-title"},[_vm._v("Інформація")])]),_vm._v(" "),_c('v-flex',{attrs:{"md4":""}},[_c('v-card',[_c('v-card-media',{attrs:{"src":_vm.carById.picture,"height":"200px"}}),_vm._v(" "),_c('v-card-title',{attrs:{"primary-title":""}},[_c('div',[_c('h3',{},[_vm._v(_vm._s(_vm.carById.make + ' ' + _vm.carById.model))]),_vm._v(" "),_c('div',[_vm._v(_vm._s(_vm.carById.info))])])]),_vm._v(" "),_c('keep-alive',[_c('v-form',{ref:"form",model:{value:(_vm.valid),callback:function ($$v) {_vm.valid=$$v},expression:"valid"}},[_c('div',{staticClass:"select-wrap"},[_c('v-select',{staticClass:"input-group--focused",attrs:{"items":_vm.selectItems,"label":"Оберіть ціль","rules":_vm.reqRule,"item-value":"value","item-text":"text"},model:{value:(_vm.selectPicker),callback:function ($$v) {_vm.selectPicker=$$v},expression:"selectPicker"}})],1),_vm._v(" "),_c('div',{staticClass:"date-wrap"},[_c('div',{staticClass:"date-title"},[_vm._v("\n                Дата з:\n              ")]),_vm._v(" "),_c('v-date-picker',{staticClass:"mb-4",attrs:{"full-width":"","min":_vm.minDate},model:{value:(_vm.datePickerFrom),callback:function ($$v) {_vm.datePickerFrom=$$v},expression:"datePickerFrom"}}),_vm._v(" "),_c('div',{staticClass:"date-title"},[_vm._v("\n                Дата по:\n              ")]),_vm._v(" "),_c('v-date-picker',{attrs:{"full-width":"","min":_vm.datePickerFrom},model:{value:(_vm.datePickerTo),callback:function ($$v) {_vm.datePickerTo=$$v},expression:"datePickerTo"}})],1),_vm._v(" "),_c('v-card-actions',[_c('v-spacer'),_vm._v(" "),_c('v-btn',{attrs:{"to":'/car/' + _vm.carById.id,"disabled":!_vm.carById.status,"color":"success"},nativeOn:{"click":function($event){$event.stopPropagation();return _vm.onForm($event)}}},[_vm._v("Замовити")])],1)],1)],1),_vm._v(" "),_c('v-dialog',{attrs:{"max-width":"400"},model:{value:(_vm.dialog),callback:function ($$v) {_vm.dialog=$$v},expression:"dialog"}},[_c('v-card',[_c('div',{staticClass:"pa-4"},[_c('h2',{staticClass:"tac"},[_vm._v("\n                    You need to be authorized to make an order\n                ")]),_vm._v(" "),_c('v-layout',{staticClass:"mt-2",attrs:{"row":"","justify-center":""}},[_c('div',[_c('v-btn',{attrs:{"to":'/login/',"color":"success"}},[_vm._v("\n                    Login\n                    ")]),_vm._v(" "),_c('v-btn',{attrs:{"to":'/regisster',"color":"error"}},[_vm._v("\n                    Register\n                    ")])],1)])],1)])],1)],1)],1),_vm._v(" "),_c('v-flex',{attrs:{"md8":""}},[_c('v-card',[_c('v-list',{staticClass:"pt-0",attrs:{"two-line":""}},[[_c('div',{staticClass:"status-message",class:_vm.carById.status ? 'success' : 'error'},[_vm._v("\n                Статус - "+_vm._s(_vm.carById.status  ? 'вільна' : 'зайнята')+"\n            ")]),_vm._v(" "),_vm._l((_vm.paramsToShow),function(value){return _c('v-list-tile',{key:value},[_c('v-list-tile-content',[_c('v-list-tile-title',[_vm._v(_vm._s(value))]),_vm._v(" "),_c('v-list-tile-sub-title',[_vm._v(_vm._s(_vm.carById[value]))])],1)],1)})]],2)],1)],1)],1)],1)}
var Car_staticRenderFns = []
var Car_esExports = { render: Car_render, staticRenderFns: Car_staticRenderFns }
/* harmony default export */ var Cars_Car = (Car_esExports);
// CONCATENATED MODULE: ./src/components/Cars/Car.vue
function Car_injectStyle (ssrContext) {
  __webpack_require__("qabz")
}
var Car_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var Car___vue_template_functional__ = false
/* styles */
var Car___vue_styles__ = Car_injectStyle
/* scopeId */
var Car___vue_scopeId__ = "data-v-85a7efb6"
/* moduleIdentifier (server only) */
var Car___vue_module_identifier__ = null
var Car_Component = Car_normalizeComponent(
  Car,
  Cars_Car,
  Car___vue_template_functional__,
  Car___vue_styles__,
  Car___vue_scopeId__,
  Car___vue_module_identifier__
)

/* harmony default export */ var components_Cars_Car = (Car_Component.exports);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/Auth/Register.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Register = ({});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-3bbcf46e","hasScoped":true,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/Auth/Register.vue
var Register_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-container',{attrs:{"grid-list-lg":""}},[_c('v-layout',{attrs:{"row":""}},[_c('v-flex',{attrs:{"md6":"","offset-md3":""}},[_c('v-card',[_c('v-card-title',[_c('h2',[_vm._v("\n                        Registration\n                    ")])]),_vm._v(" "),_c('app-register-form')],1)],1)],1)],1)}
var Register_staticRenderFns = []
var Register_esExports = { render: Register_render, staticRenderFns: Register_staticRenderFns }
/* harmony default export */ var Auth_Register = (Register_esExports);
// CONCATENATED MODULE: ./src/components/Auth/Register.vue
function Register_injectStyle (ssrContext) {
  __webpack_require__("cR0/")
}
var Register_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var Register___vue_template_functional__ = false
/* styles */
var Register___vue_styles__ = Register_injectStyle
/* scopeId */
var Register___vue_scopeId__ = "data-v-3bbcf46e"
/* moduleIdentifier (server only) */
var Register___vue_module_identifier__ = null
var Register_Component = Register_normalizeComponent(
  Register,
  Auth_Register,
  Register___vue_template_functional__,
  Register___vue_styles__,
  Register___vue_scopeId__,
  Register___vue_module_identifier__
)

/* harmony default export */ var components_Auth_Register = (Register_Component.exports);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/Auth/Login.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Login = ({
    data: function data() {
        return {
            passRules: [function (v) {
                return !!v || 'Password is required';
            }, function (v) {
                return v.length > 5 || 'Enter at least 6 characters';
            }],
            emailRules: [function (v) {
                return !!v || 'E-mail is required';
            }, function (v) {
                return (/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
                );
            }],
            valid2: false,
            email: '',
            pass: ''
        };
    },

    computed: {},
    methods: {
        onLogin: function onLogin() {
            var query = {
                action: 'login',
                pass: this.pass,
                email: this.email
            };

            this.$store.dispatch('loginUser', query);
        }
    }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-0fbbdf22","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/Auth/Login.vue
var Login_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-container',{attrs:{"grid-list-lg":""}},[_c('v-layout',{attrs:{"row":""}},[_c('v-flex',{attrs:{"md6":"","offset-md3":""}},[_c('v-card',[_c('v-card-title',[_c('h2',[_vm._v("\n                        Login\n                    ")])]),_vm._v(" "),_c('v-form',{staticClass:"pl-3 pr-3",model:{value:(_vm.valid2),callback:function ($$v) {_vm.valid2=$$v},expression:"valid2"}},[_c('v-text-field',{attrs:{"rules":_vm.emailRules,"label":"E-mail","required":""},model:{value:(_vm.email),callback:function ($$v) {_vm.email=$$v},expression:"email"}}),_vm._v(" "),_c('v-text-field',{attrs:{"label":"Password","rules":_vm.passRules,"type":"password","required":""},model:{value:(_vm.pass),callback:function ($$v) {_vm.pass=$$v},expression:"pass"}}),_vm._v(" "),_c('v-card-actions',[_c('v-spacer'),_vm._v(" "),_c('v-btn',{staticClass:"success",attrs:{"disabled":!_vm.valid2},nativeOn:{"click":function($event){return _vm.onLogin($event)}}},[_vm._v("\n                        Send\n                        ")])],1)],1)],1)],1)],1)],1)}
var Login_staticRenderFns = []
var Login_esExports = { render: Login_render, staticRenderFns: Login_staticRenderFns }
/* harmony default export */ var Auth_Login = (Login_esExports);
// CONCATENATED MODULE: ./src/components/Auth/Login.vue
var Login_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var Login___vue_template_functional__ = false
/* styles */
var Login___vue_styles__ = null
/* scopeId */
var Login___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var Login___vue_module_identifier__ = null
var Login_Component = Login_normalizeComponent(
  Login,
  Auth_Login,
  Login___vue_template_functional__,
  Login___vue_styles__,
  Login___vue_scopeId__,
  Login___vue_module_identifier__
)

/* harmony default export */ var components_Auth_Login = (Login_Component.exports);

// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/Auth/Settings.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Settings = ({
    data: function data() {
        return {
            reqRule: [function (v) {
                return !!v || 'This field is required';
            }],
            passRules: [function (v) {
                return !!v || 'Password is required';
            }, function (v) {
                return v.length > 5 || 'Enter at least 6 characters';
            }],
            emailRules: [function (v) {
                return !!v || 'E-mail is required';
            }, function (v) {
                return (/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
                );
            }],
            valid2: false,
            name: '',
            email: '',
            pass: '',
            surname: '',
            selectDrive: null,
            selectExp: null,
            selectExp2: null
        };
    },

    computed: {
        driveCats: function driveCats() {
            return this.$store.state.userInfo.driveCats;
        },
        driveExp: function driveExp() {
            return this.$store.state.userInfo.driveExp;
        }
    },
    methods: {
        onRegister: function onRegister() {
            var user = {
                action: 'register',
                name: this.name,
                surname: this.surname,
                pass: this.pass,
                email: this.email,
                category: this.selectDrive.text,
                exp: this.selectExp.text,
                expna: this.selectExp2.text
            };

            this.$store.dispatch('registerUser', user);
        }
    }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-82dcb136","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/Auth/Settings.vue
var Settings_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-container',{attrs:{"grid-list-lg":""}},[_c('v-layout',{attrs:{"row":""}},[_c('v-flex',{attrs:{"md6":"","offset-md3":""}},[_c('v-card',[_c('v-card-title',[_c('h2',[_vm._v("\r\n                            My Settings\r\n                        ")])]),_vm._v(" "),_c('v-form',{staticClass:"pl-3 pr-3",model:{value:(_vm.valid2),callback:function ($$v) {_vm.valid2=$$v},expression:"valid2"}},[_c('v-text-field',{attrs:{"label":"Name","rules":_vm.reqRule,"required":""},model:{value:(_vm.name),callback:function ($$v) {_vm.name=$$v},expression:"name"}}),_vm._v(" "),_c('v-text-field',{attrs:{"label":"Surname","rules":_vm.reqRule,"required":""},model:{value:(_vm.surname),callback:function ($$v) {_vm.surname=$$v},expression:"surname"}}),_vm._v(" "),_c('v-text-field',{attrs:{"label":"Password","rules":_vm.passRules,"type":"password","required":""},model:{value:(_vm.pass),callback:function ($$v) {_vm.pass=$$v},expression:"pass"}}),_vm._v(" "),_c('v-text-field',{attrs:{"rules":_vm.emailRules,"label":"E-mail","required":""},model:{value:(_vm.email),callback:function ($$v) {_vm.email=$$v},expression:"email"}}),_vm._v(" "),_c('v-select',{attrs:{"items":_vm.driveCats,"label":"Водійське посвідчення","rules":_vm.reqRule,"required":""},model:{value:(_vm.selectDrive),callback:function ($$v) {_vm.selectDrive=$$v},expression:"selectDrive"}}),_vm._v(" "),_c('v-select',{attrs:{"items":_vm.driveExp,"label":"Стаж водіння (у роках)","rules":_vm.reqRule,"required":""},model:{value:(_vm.selectExp),callback:function ($$v) {_vm.selectExp=$$v},expression:"selectExp"}}),_vm._v(" "),_c('v-select',{attrs:{"items":_vm.driveExp,"label":"Стаж водіння без аварій (у роках)","rules":_vm.reqRule,"required":""},model:{value:(_vm.selectExp2),callback:function ($$v) {_vm.selectExp2=$$v},expression:"selectExp2"}}),_vm._v(" "),_c('v-card-actions',[_c('v-spacer'),_vm._v(" "),_c('v-btn',{staticClass:"success",attrs:{"disabled":!_vm.valid2},nativeOn:{"click":function($event){return _vm.onRegister($event)}}},[_vm._v("\r\n                            Send\r\n                            ")])],1)],1)],1)],1)],1)],1)}
var Settings_staticRenderFns = []
var Settings_esExports = { render: Settings_render, staticRenderFns: Settings_staticRenderFns }
/* harmony default export */ var Auth_Settings = (Settings_esExports);
// CONCATENATED MODULE: ./src/components/Auth/Settings.vue
var Settings_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var Settings___vue_template_functional__ = false
/* styles */
var Settings___vue_styles__ = null
/* scopeId */
var Settings___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var Settings___vue_module_identifier__ = null
var Settings_Component = Settings_normalizeComponent(
  Settings,
  Auth_Settings,
  Settings___vue_template_functional__,
  Settings___vue_styles__,
  Settings___vue_scopeId__,
  Settings___vue_module_identifier__
)

/* harmony default export */ var components_Auth_Settings = (Settings_Component.exports);

// CONCATENATED MODULE: ./src/router/index.js








vue_esm["a" /* default */].use(vue_router_esm["a" /* default */]);

/* harmony default export */ var router = (new vue_router_esm["a" /* default */]({
  routes: [{
    path: '/',
    name: 'Home',
    component: src_components_Home
  }, {
    path: '/car/:id',
    name: 'Car',
    component: components_Cars_Car,
    props: true
  }, {
    path: '/register',
    name: 'Register',
    component: components_Auth_Register
  }, {
    path: '/login',
    name: 'Login',
    component: components_Auth_Login
  }, {
    path: '/settings',
    name: 'Settings',
    component: components_Auth_Settings
  }],
  mode: 'history'
}));
// EXTERNAL MODULE: ./node_modules/vuetify/dist/vuetify.js
var vuetify = __webpack_require__("3EgV");
var vuetify_default = /*#__PURE__*/__webpack_require__.n(vuetify);

// EXTERNAL MODULE: ./node_modules/vuetify/dist/vuetify.min.css
var vuetify_min = __webpack_require__("7zck");
var vuetify_min_default = /*#__PURE__*/__webpack_require__.n(vuetify_min);

// EXTERNAL MODULE: ./node_modules/vuex/dist/vuex.esm.js
var vuex_esm = __webpack_require__("NYxO");

// EXTERNAL MODULE: ./node_modules/axios/index.js
var axios = __webpack_require__("mtWM");
var axios_default = /*#__PURE__*/__webpack_require__.n(axios);

// CONCATENATED MODULE: ./src/store/cars.js


/* harmony default export */ var store_cars = ({
    state: {
        cars: [],
        paramsToShow: ['make', 'model', 'class_type', 'tran_type', 'type', 'fuel_type', 'price']
    },
    mutations: {
        setAllCars: function setAllCars(state, payload) {
            state.cars.push(payload);
        }
    },
    actions: {
        getCars: function getCars(_ref) {
            var commit = _ref.commit;

            axios_default.a.get('http://localhost/auto/app/public/index.php?action=getAllCars').then(function (response) {
                var cars = response.data;
                for (var car in cars) {
                    commit('setAllCars', cars[car]);
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    },
    getters: {
        cars: function cars(state) {
            return state.cars;
        },
        paramsToShow: function paramsToShow(state) {
            return state.paramsToShow;
        },
        carParams: function carParams(state) {
            var carParams = {};
            state.paramsToShow.forEach(function (element) {
                carParams[element] = [];
            });
            state.cars.forEach(function (element) {
                for (var prop in element) {
                    if (prop in carParams && carParams[prop].indexOf(prop) === -1) {
                        carParams[prop].push(element[prop]);
                    }
                }
            });
            return carParams;
        }
    }
});
// CONCATENATED MODULE: ./src/store/userInfo.js
/* harmony default export */ var userInfo = ({
  state: {
    driveCats: [{
      text: 'A'
    }, {
      text: 'B'
    }, {
      text: 'C'
    }, {
      text: 'D'
    }, {
      text: 'Інші - A1, B1, D1 і тд'
    }],
    driveExp: [{
      text: '<1'
    }, {
      text: '2'
    }, {
      text: '3'
    }, {
      text: '4'
    }, {
      text: '>5'
    }]
  }
});
// EXTERNAL MODULE: ./node_modules/qs/lib/index.js
var lib = __webpack_require__("mw3O");
var lib_default = /*#__PURE__*/__webpack_require__.n(lib);

// CONCATENATED MODULE: ./src/store/user.js




var api = 'http://localhost/auto/app/public/index.php';

/* harmony default export */ var store_user = ({
    state: {
        user: null
    },

    mutations: {
        setUser: function setUser(state, payload) {
            state.user = payload;
        }
    },
    actions: {
        registerUser: function registerUser(_ref, payload) {
            var commit = _ref.commit;

            var user = lib_default.a.stringify(payload);
            axios_default.a.post(api, user).then(function (response) {
                commit('clearMessage');

                var msg = response.data.messages[0];
                var status = response.data.status;

                if (status) {
                    var userId = response.data.id;
                    commit('setUser', userId);
                }
                commit('setMessage', msg);
            }).catch(function (error) {
                console.log(error);
                console.log(222);
            });
        },
        loginUser: function loginUser(_ref2, payload) {
            var commit = _ref2.commit;

            var user = lib_default.a.stringify(payload);
            axios_default.a.post(api, user).then(function (response) {
                commit('clearMessage');
                var msg = response.data.messages[0];
                var status = response.data.status;

                if (status) {
                    var userId = response.data.id;
                    commit('setUser', userId);
                    router.push('/');
                }
                commit('setMessage', msg);
            }).catch(function (error) {
                console.log(error);
            });
        },
        autoLogin: function autoLogin(_ref3) {
            var commit = _ref3.commit;

            axios_default.a.post(api, "action=getId").then(function (response) {
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        }
    },

    getters: {}

});
// CONCATENATED MODULE: ./src/store/messages.js
/* harmony default export */ var messages = ({
    state: {
        message: null,
        isVisibleMsg: false
    },
    mutations: {
        setMessage: function setMessage(state, payload) {
            state.message = payload, state.isVisibleMsg = true;
        },
        clearMessage: function clearMessage(state) {
            state.message = null;
            state.isVisibleMsg = false;
        }
    }
});
// CONCATENATED MODULE: ./src/store/orders.js




var orders_api = 'http://localhost/auto/app/public/index.php';

/* harmony default export */ var orders = ({
    state: {
        currentOrderPrice: null
    },
    actions: {
        sendOrderStep1: function sendOrderStep1(_ref, payload) {
            var commit = _ref.commit;

            var order = lib_default.a.stringify(payload);
            axios_default.a.post(orders_api, order).then(function (response) {
                commit('clearMessage');
                var price = response.data.price;
                if (price) {
                    commit('setMessage', 'Final price of order - ' + price);
                    axios_default.a.post(orders_api, "action=step&step=form").then(function (response) {
                        console.log(response);
                    }).catch(function (error) {
                        console.log(error);
                    });
                } else {
                    commit('setMessage', 'Something goes wrong, try again later');
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    }
});
// CONCATENATED MODULE: ./src/store/index.js








vue_esm["a" /* default */].use(vuex_esm["a" /* default */]);

/* harmony default export */ var store = (new vuex_esm["a" /* default */].Store({
    modules: {
        cars: store_cars,
        userInfo: userInfo,
        user: store_user,
        messages: messages,
        orders: orders
    }
}));
// CONCATENATED MODULE: ./node_modules/babel-loader/lib!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./src/components/Auth/RegisterForm.vue
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var RegisterForm = ({
    data: function data() {
        return {
            reqRule: [function (v) {
                return !!v || 'This field is required';
            }],
            passRules: [function (v) {
                return !!v || 'Password is required';
            }, function (v) {
                return v.length > 5 || 'Enter at least 6 characters';
            }],
            emailRules: [function (v) {
                return !!v || 'E-mail is required';
            }, function (v) {
                return (/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
                );
            }],
            valid2: false,
            name: '',
            email: '',
            pass: '',
            surname: '',
            selectDrive: null,
            selectExp: null,
            selectExp2: null
        };
    },

    computed: {
        driveCats: function driveCats() {
            return this.$store.state.userInfo.driveCats;
        },
        driveExp: function driveExp() {
            return this.$store.state.userInfo.driveExp;
        }
    },
    methods: {
        onRegister: function onRegister() {
            var user = {
                action: 'register',
                name: this.name,
                surname: this.surname,
                pass: this.pass,
                email: this.email,
                category: this.selectDrive.text,
                exp: this.selectExp.text,
                expna: this.selectExp2.text
            };

            this.$store.dispatch('registerUser', user);
        }
    }

});
// CONCATENATED MODULE: ./node_modules/vue-loader/lib/template-compiler?{"id":"data-v-53ab91f9","hasScoped":false,"transformToRequire":{"video":["src","poster"],"source":"src","img":"src","image":"xlink:href"},"buble":{"transforms":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./src/components/Auth/RegisterForm.vue
var RegisterForm_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('v-form',{staticClass:"pl-3 pr-3",model:{value:(_vm.valid2),callback:function ($$v) {_vm.valid2=$$v},expression:"valid2"}},[_c('v-text-field',{attrs:{"label":"Name","rules":_vm.reqRule,"required":""},model:{value:(_vm.name),callback:function ($$v) {_vm.name=$$v},expression:"name"}}),_vm._v(" "),_c('v-text-field',{attrs:{"label":"Surname","rules":_vm.reqRule,"required":""},model:{value:(_vm.surname),callback:function ($$v) {_vm.surname=$$v},expression:"surname"}}),_vm._v(" "),_c('v-text-field',{attrs:{"label":"Password","rules":_vm.passRules,"type":"password","required":""},model:{value:(_vm.pass),callback:function ($$v) {_vm.pass=$$v},expression:"pass"}}),_vm._v(" "),_c('v-text-field',{attrs:{"rules":_vm.emailRules,"label":"E-mail","required":""},model:{value:(_vm.email),callback:function ($$v) {_vm.email=$$v},expression:"email"}}),_vm._v(" "),_c('v-select',{attrs:{"items":_vm.driveCats,"label":"Водійське посвідчення","rules":_vm.reqRule,"required":""},model:{value:(_vm.selectDrive),callback:function ($$v) {_vm.selectDrive=$$v},expression:"selectDrive"}}),_vm._v(" "),_c('v-select',{attrs:{"items":_vm.driveExp,"label":"Стаж водіння (у роках)","rules":_vm.reqRule,"required":""},model:{value:(_vm.selectExp),callback:function ($$v) {_vm.selectExp=$$v},expression:"selectExp"}}),_vm._v(" "),_c('v-select',{attrs:{"items":_vm.driveExp,"label":"Стаж водіння без аварій (у роках)","rules":_vm.reqRule,"required":""},model:{value:(_vm.selectExp2),callback:function ($$v) {_vm.selectExp2=$$v},expression:"selectExp2"}}),_vm._v(" "),_c('v-card-actions',[_c('v-spacer'),_vm._v(" "),_c('v-btn',{staticClass:"success",attrs:{"disabled":!_vm.valid2},nativeOn:{"click":function($event){return _vm.onRegister($event)}}},[_vm._v("\n        Send\n        ")])],1)],1)}
var RegisterForm_staticRenderFns = []
var RegisterForm_esExports = { render: RegisterForm_render, staticRenderFns: RegisterForm_staticRenderFns }
/* harmony default export */ var Auth_RegisterForm = (RegisterForm_esExports);
// CONCATENATED MODULE: ./src/components/Auth/RegisterForm.vue
var RegisterForm_normalizeComponent = __webpack_require__("VU/8")
/* script */


/* template */

/* template functional */
var RegisterForm___vue_template_functional__ = false
/* styles */
var RegisterForm___vue_styles__ = null
/* scopeId */
var RegisterForm___vue_scopeId__ = null
/* moduleIdentifier (server only) */
var RegisterForm___vue_module_identifier__ = null
var RegisterForm_Component = RegisterForm_normalizeComponent(
  RegisterForm,
  Auth_RegisterForm,
  RegisterForm___vue_template_functional__,
  RegisterForm___vue_styles__,
  RegisterForm___vue_scopeId__,
  RegisterForm___vue_module_identifier__
)

/* harmony default export */ var components_Auth_RegisterForm = (RegisterForm_Component.exports);

// CONCATENATED MODULE: ./src/main.js
// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.








vue_esm["a" /* default */].component('app-register-form', components_Auth_RegisterForm);

vue_esm["a" /* default */].use(vuetify_default.a);

vue_esm["a" /* default */].config.productionTip = false;

/* eslint-disable no-new */
new vue_esm["a" /* default */]({
  el: '#app',
  router: router,
  store: store,
  components: { App: src_App },
  template: '<App/>',
  created: function created() {
    store.dispatch('getCars');
    store.dispatch('autoLogin');
  }
});

/***/ }),

/***/ "O6Wo":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "cR0/":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "qabz":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })

},["NHnr"]);
//# sourceMappingURL=app.796dd82b32b24c3b4759.js.map