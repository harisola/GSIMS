! function(t, e, i, s) {
    "use strict";
    var a = "datepaginator",
        o = function(e, i) {
            this._element = e, this.$element = t(e), this._init(i)
        };
    o.defaults = {
        fillWidth: !0,
        highlightSelectedDate: !0,
        highlightToday: !0,
        hint: "dddd, Do MMMM YYYY",
        injectStyle: !0,
        itemWidth: 35,
        navItemWidth: 20,
        offDays: "Sat,Sun",
        offDaysFormat: "ddd",
        onSelectedDateChanged: null,
        selectedDate: moment().clone().startOf("day"),
        selectedDateFormat: "YYYY-MM-DD",
        selectedItemWidth: 140,
        showCalendar: !0,
        showOffDays: !0,
        showStartOfWeek: !0,
        size: s,
        startOfWeek: "Mon",
        startOfWeekFormat: "ddd",
        squareEdges: !1,
        text: "ddd<br/>Do",
        textSelected: "dddd<br/>Do, MMMM YYYY",
        width: 0,
        startDate: moment(new Date(-864e13)),
        startDateFormat: "YYYY-MM-DD",
        endDate: moment(new Date(864e13)),
        endDateFormat: "YYYY-MM-DD"
    }, o.prototype = {
        setSelectedDate: function(t, e) {
            this._setSelectedDate(moment(t, e ? e : this.options.selectedDateFormat)), this._render()
        },
        remove: function() {
            this._destroy(), t.removeData(this, "plugin_" + a)
        },
        _init: function(e) {
            this.options = t.extend({}, o.defaults, e), this.options.width ? this.options.fillWidth = !1 : (this.options.width = this.$element.width(), this.options.fillWidth = !0), "string" == typeof this.options.startDate && (this.options.startDate = moment(this.options.startDate, this.options.startDateFormat).clone().startOf("day")), "string" == typeof this.options.endDate && (this.options.endDate = moment(this.options.endDate, this.options.endDateFormat).clone().startOf("day")), "string" == typeof this.options.selectedDate && (this.options.selectedDate = moment(this.options.selectedDate, this.options.selectedDateFormat).clone().startOf("day")), this.options.selectedDate.isBefore(this.options.startDate) && (this.options.selectedDate = this.options.startDate.clone()), this.options.selectedDate.isAfter(this.options.endDate) && (this.options.selectedDate = this.options.endDate.clone()), "small" === this.options.size ? this.options.size = "sm" : "large" === this.options.size && (this.options.size = "lg"), this._destroy(), this._subscribeEvents(), this._render()
        },
        _unsubscribeEvents: function() {
            this.$element.off("click"), this.$element.off("selectedDateChanged")
        },
        _subscribeEvents: function() {
            this._unsubscribeEvents(), this.$element.on("click", t.proxy(this._clickedHandler, this)), "function" == typeof this.options.onSelectedDateChanged && this.$element.on("selectedDateChanged", this.options.onSelectedDateChanged), this.options.fillWidth && t(e).on("resize", t.proxy(this._resize, this))
        },
        _destroy: function() {
            this.initialized && (this.$calendar && this.$calendar.datepicker("remove"), this.$wrapper.remove(), this.$wrapper = null, this._unsubscribeEvents()), this.initialized = !1
        },
        _clickedHandler: function(e) {
            e.preventDefault();
            var i = t(e.target),
                s = i.attr("class"); - 1 != s.indexOf("dp-nav-left") ? this._back() : -1 != s.indexOf("dp-nav-right") ? this._forward() : -1 != s.indexOf("dp-item") && this._select(i.attr("data-moment"))
        },
        _setSelectedDate: function(t) {
            t.isSame(this.options.selectedDate) || t.isBefore(this.options.startDate) || t.isAfter(this.options.endDate) || (this.options.selectedDate = t.startOf("day"), this.$element.trigger("selectedDateChanged", [t.clone()]))
        },
        _back: function() {
            this._setSelectedDate(this.options.selectedDate.clone().subtract("day", 1)), this._render()
        },
        _forward: function() {
            this._setSelectedDate(this.options.selectedDate.clone().add("day", 1)), this._render()
        },
        _select: function(t) {
            this._setSelectedDate(moment(t, this.options.selectedDateFormat)), this._render()
        },
        _calendarSelect: function(t) {
            this._setSelectedDate(moment(t.date)), this._render()
        },
        _resize: function() {
            this.options.width = this.$element.width(), this._render()
        },
        _render: function() {
            var e = this;
            this.initialized ? this.$calendar && this.$calendar.datepicker("remove") : (this.$element.removeClass("datepaginator datepaginator-sm datepaginator-lg").addClass("sm" === this.options.size ? "datepaginator-sm" : "lg" === this.options.size ? "datepaginator-lg" : "datepaginator"), this.$wrapper = t(this._template.list), this.$leftNav = t(this._template.navItem).addClass("dp-nav-left").addClass("sm" === this.options.size ? "dp-nav-sm" : "lg" === this.options.size ? "dp-nav-lg" : "").addClass(this.options.squareEdges ? "dp-nav-square-edges" : "").append(t(this._template.icon).addClass("glyphicon-chevron-left").addClass("dp-nav-left")).width(this.options.navItemWidth), this.$rightNav = t(this._template.navItem).addClass("dp-nav-right").addClass("sm" === this.options.size ? "dp-nav-sm" : "lg" === this.options.size ? "dp-nav-lg" : "").addClass(this.options.squareEdges ? "dp-nav-square-edges" : "").append(t(this._template.icon).addClass("glyphicon-chevron-right").addClass("dp-nav-right")).width(this.options.navItemWidth), this.$calendar = this.options.showCalendar ? t(this._template.calendar) : s, this._injectStyle(), this.initialized = !0);
            var i = this._buildData();
            this.$element.empty().append(this.$wrapper.empty()), this.$leftNav.removeClass("dp-no-select").attr("title", ""), i.isSelectedStartDate && this.$leftNav.addClass("dp-no-select").attr("title", "Start of valid date range"), this.$wrapper.append(t(e._template.listItem).append(this.$leftNav)), t.each(i.items, function(i, s) {
                var a = t(e._template.dateItem).attr("data-moment", s.m).attr("title", s.hint).width(s.itemWidth);
                s.isSelected && e.options.highlightSelectedDate && a.addClass("dp-selected"), s.isToday && e.options.highlightToday && a.addClass("dp-today"), s.isStartOfWeek && e.options.showStartOfWeek && a.addClass("dp-divider"), s.isOffDay && e.options.showOffDays && a.addClass("dp-off"), s.isSelected && e.options.showCalendar && a.append(e.$calendar), "sm" === e.options.size ? a.addClass("dp-item-sm") : "lg" === e.options.size && a.addClass("dp-item-lg"), s.isValid || a.addClass("dp-no-select"), a.append(s.text), e.$wrapper.append(t(e._template.listItem).append(a))
            }), this.$rightNav.removeClass("dp-no-select").attr("title", ""), i.isSelectedEndDate && this.$rightNav.addClass("dp-no-select").attr("title", "End of valid date range"), this.$wrapper.append(t(e._template.listItem).append(this.$rightNav)), this.$calendar && (this.$calendar.datepicker({
                autoclose: !0,
                forceParse: !0,
                startView: 0,
                minView: 0,
                todayHighlight: !0,
                startDate: this.options.startDate.toDate(),
                endDate: this.options.endDate.toDate()
            }).datepicker("update", this.options.selectedDate.toDate()), this.$calendar.on("changeDate", t.proxy(this._calendarSelect, this)))
        },
        _injectStyle: function() {
            this.options.injectStyle && !i.getElementById("bootstrap-datepaginator-style") && t('<style type="text/css" id="bootstrap-datepaginator-style">' + this._css + "</style>").appendTo("head")
        },
        _buildData: function() {
            for (var t = this.options.width - (this.options.selectedItemWidth - this.options.itemWidth + 2 * this.options.navItemWidth), e = Math.floor(t / this.options.itemWidth), i = parseInt(e / 2), s = Math.floor(t / e), a = Math.floor(this.options.selectedItemWidth + (t - e * s)), o = moment().startOf("day"), n = this.options.selectedDate.clone().subtract("days", i), d = this.options.selectedDate.clone().add("days", e - i), p = {
                    isSelectedStartDate: this.options.selectedDate.isSame(this.options.startDate) ? !0 : !1,
                    isSelectedEndDate: this.options.selectedDate.isSame(this.options.endDate) ? !0 : !1,
                    items: []
                }, r = n; r.isBefore(d); r.add("days", 1)) {
                var h = (r.isSame(this.options.startDate) || r.isAfter(this.options.startDate)) && (r.isSame(this.options.endDate) || r.isBefore(this.options.endDate)) ? !0 : !1;
                p.items[p.items.length] = {
                    m: r.clone().format(this.options.selectedDateFormat),
                    isValid: h,
                    isSelected: r.isSame(this.options.selectedDate) ? !0 : !1,
                    isToday: r.isSame(o) ? !0 : !1,
                    isOffDay: -1 !== this.options.offDays.split(",").indexOf(r.format(this.options.offDaysFormat)) ? !0 : !1,
                    isStartOfWeek: -1 !== this.options.startOfWeek.split(",").indexOf(r.format(this.options.startOfWeekFormat)) ? !0 : !1,
                    text: r.format(r.isSame(this.options.selectedDate) ? this.options.textSelected : this.options.text),
                    hint: h ? r.format(this.options.hint) : "Invalid date",
                    itemWidth: r.isSame(this.options.selectedDate) ? a : s
                }
            }
            return p
        },
        _template: {
            list: '<ul class="pagination"></ul>',
            listItem: "<li></li>",
            navItem: '<a href="#" class="dp-nav"></a>',
            dateItem: '<a href="#" class="dp-item"></a>',
            icon: '<i class="glyphicon"></i>',
            calendar: '<i id="dp-calendar" class="glyphicon glyphicon-calendar"></i>'
        },
        _css: ".datepaginator{font-size:12px;height:60px}.datepaginator-sm{font-size:10px;height:40px}.datepaginator-lg{font-size:14px;height:80px}.pagination{margin:0;padding:0;white-space:nowrap}.dp-nav{height:60px;padding:22px 0!important;width:20px;margin:0!important;text-align:center}.dp-nav-square-edges{border-radius:0!important}.dp-item{height:60px;padding:13px 0!important;width:35px;margin:0!important;border-left-style:hidden!important;text-align:center}.dp-item-sm{height:40px!important;padding:5px!important}.dp-item-lg{height:80px!important;padding:22px 0!important}.dp-nav-sm{height:40px!important;padding:11px 0!important}.dp-nav-lg{height:80px!important;padding:33px 0!important}a.dp-nav-right{border-left-style:hidden!important}.dp-divider{border-left:2px solid #ddd!important}.dp-off{background-color:#F0F0F0!important}.dp-no-select{color:#ccc!important;background-color:#F0F0F0!important}.dp-no-select:hover{background-color:#F0F0F0!important}.dp-today{background-color:#88B5DB!important;color:#fff!important}.dp-selected{background-color:#428bca!important;color:#fff!important;width:140px}#dp-calendar{padding:3px 5px 0 0!important;margin-right:3px;position:absolute;right:0;top:10}"
    };
    var n = function(t) {
        e.console && e.console.error(t)
    };
    t.fn[a] = function(e, i) {
        return this.each(function() {
            var s = t.data(this, "plugin_" + a);
            "string" == typeof e ? s ? t.isFunction(s[e]) && "_" !== e.charAt(0) ? ("string" == typeof i && (i = [i]), s[e].apply(s, i)) : n("No such method : " + e) : n("Not initialized, can not call method : " + e) : s ? s._init(e) : t.data(this, "plugin_" + a, new o(this, e))
        })
    }
}(jQuery, window, document);