'use strict';

new Vue({
  el: '#app',
  data: function data() {
    return {};
  },
  mounted: function mounted() {
    flatpickr(".date", {
      minDate: 'today'
    });

    flatpickr(".time", {
      enableTime: true,
      noCalendar: true,
      minuteIncrement: 1,
      dateFormat: "h:i K",
      mode: "range"
    });

    var slider = document.getElementById('slider');
    noUiSlider.create(slider, {
      start: [420, 960],
      connect: true,
	  disable: true,
      step: 2,
      tooltips: [true, true],
	  range: {
        'min': 360,
        'max': 1080
      },
      pips: {
        mode: 'steps',
        //values: [0, 720, 1439],
        filter: function filter(value, type) {
          console.log(type, value, value % 60);
          return value % (60 * 10) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
        },
        //density: 2,
        format: {
          to: function to(value) {
            if (value % (60 * 2) === 0) {
              return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
            }
            return '';
          },
          from: function from(value) {
            return value;
          }
        }
      },
      format: {
        to: function to(value) {
          //return value + ',-';
          return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
        },
        from: function from(value) {
          return value;
        }
      }
    });
	
	var slider = document.getElementById('slider1');
    noUiSlider.create(slider, {
      start: [420, 640, 890, 960],
      connect: [false, true, false, true, false],
      step: 1,
	  tooltips: [true, true, true, true],
      range: {
        'min': 360,
        'max': 1080
      },
      pips: {
        mode: 'steps',
        //values: [0, 720, 1439],
        filter: function filter(value, type) {
          console.log(type, value, value % 60);
          return value % (60 * 2) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
        },
        //density: 2,
        format: {
          to: function to(value) {
            if (value % (60 * 2) === 0) {
              return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
            }
            return '';
          },
          from: function from(value) {
            return value;
          }
        }
      },
      format: {
        to: function to(value) {
          //return value + ',-';
          return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
        },
        from: function from(value) {
          return value;
        }
      }
    });
	
	var slider = document.getElementById('AiAabsentia');
    noUiSlider.create(slider, {
      start: [615, 750],
      connect: [false, true, false],
      step: 1,
	  disabled: true,
	  tooltips: [true, true],
      range: {
        'min': 360,
        'max': 1080
      },
      pips: {
        mode: 'steps',
        //values: [0, 720, 1439],
        filter: function filter(value, type) {
          console.log(type, value, value % 60);
          return value % (60 * 2) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
        },
        //density: 2,
        format: {
          to: function to(value) {
            if (value % (60 * 2) === 0) {
              return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
            }
            return '';
          },
          from: function from(value) {
            return value;
          }
        }
      },
      format: {
        to: function to(value) {
          //return value + ',-';
          return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
        },
        from: function from(value) {
          return value;
        }
      }
    });
	
	var slider = document.getElementById('bufferTime');
    noUiSlider.create(slider, {
      start: [420, 424],
      connect: [false, true, false],
      step: 2,
	  tooltips: [true, true],
      range: {
        'min': 360,
        'max': 1080
      },
      pips: {
        mode: 'steps',
        //values: [0, 720, 1439],
        filter: function filter(value, type) {
          console.log(type, value, value % 60);
          return value % (60 * 2) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
        },
        //density: 2,
        format: {
          to: function to(value) {
            if (value % (60 * 2) === 0) {
              return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
            }
            return '';
          },
          from: function from(value) {
            return value;
          }
        }
      },
      format: {
        to: function to(value) {
          //return value + ',-';
          return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
        },
        from: function from(value) {
          return value;
        }
      }
    });
	
	var slider = document.getElementById('PayrollAttendance');
    noUiSlider.create(slider, {
      start: [420, 750, 890, 960],
      connect: [false, true, true, true, false],
      step: 1,
	  tooltips: [true, true, true, true],
	  disabled: true,
      range: {
        'min': 360,
        'max': 1080
      },
	  
      pips: {
        mode: 'steps',
        //values: [0, 720, 1439],
        filter: function filter(value, type) {
          console.log(type, value, value % 60);
          return value % (60 * 2) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
        },
        //density: 2,
        format: {
          to: function to(value) {
            if (value % (60 * 2) === 0) {
              return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
            }
            return '';
          },
          from: function from(value) {
            return value;
          }
        }
      },
      format: {
        to: function to(value) {
          //return value + ',-';
          return moment().startOf('day').add(value, 'minutes').format('hh:mm A');
        },
        from: function from(value) {
          return value;
        }
      }
    });
	var connect = PayrollAttendance.querySelectorAll('.noUi-connect');
	var classes = ['c-1-color', 'c-2-color', 'c-3-color', 'c-4-color', 'c-5-color'];

	for ( var i = 0; i < connect.length; i++ ) {
    	connect[i].classList.add(classes[i]);
	}
	
  }
});