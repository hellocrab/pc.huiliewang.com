webpackJsonp([32], {
    481: function(e, i, t) {
        function n(e) {
            t(802)
        }
        var o = t(0)(t(644), t(930), n, "data-v-626c9f4a", null);
        e.exports = o.exports
    },
    644: function(e, i, t) {
        "use strict";
        Object.defineProperty(i, "__esModule", {
            value: !0
        });
        var n = t(8),
            o = t.n(n),
            A = t(15),
            r = t.n(A),
            d = t(14),
            s = t(3),
            a = t(9),
            c = t(141),
            l = t.n(c);
        i.default = {
            name: "welcome",
            data: function() {
                return {}
            },
            computed: r()({}, t.i(a.b)(["welcomeInfo", "userInfo"])),
            beforeRouteLeave: function(e, i, t) {
                "login" === e.name ? this.$store.commit("updateWelcomeInfo", {
                    type: "welcome",
                    redirect: this.$route.query.redirect,
                    login: !1
                }) : this.$store.commit("updateWelcomeInfo", {}), t()
            },
            mounted: function() {
                "" !== this.userInfo && void 0 !== this.userInfo.token && void 0 !== window.localStorage.wkurl && this.$router.replace({
                    path: "/"
                }), "welcome" === this.welcomeInfo.type && this.welcomeInfo.login ? void 0 !== this.welcomeInfo.redirect && "" !== this.welcomeInfo.redirect && "/login" !== this.welcomeInfo.redirect ? this.$router.replace({
                    path: this.welcomeInfo.redirect
                }) : this.$router.replace({
                    path: "/"
                }) : "login" === this.$route.params.action && void 0 === this.welcomeInfo.login && this.$router.push({
                    path: "/login"
                })
            },
            methods: {
                enterLogin: function() {
                    this.$router.push({
                        path: "/login"
                    })
                },
                enterExperience: function() {
                    window.localStorage.wkurl = "../", t.i(d.b)("POST", "m=user&a=login", {
                        name: "admin",
                        password: l()("admin123")
                    }, this, function(e, i, n) {
                        if (i.canuse = !0, n) {
                            e.img = t.i(s.c)(e.img), i.getPermission(e);
                            var A = e;
                            document.title = e.system_name, i.$store.dispatch("setUserInfo", A), window.sessionStorage.user = o()(A), window.localStorage.user = o()(A), window.localStorage.system_name = e.system_name, i.welcomeInfo.login = !0, i.$store.commit("updateWelcomeInfo", i.welcomeInfo), i.$router.replace({
                                path: "/"
                            })
                        }
                    })
                },
                getPermission: function(e) {
                    var i = ["customer", "business", "knowledge", "contacts", "product", "leads", "contract", "announcement", "examine", "event", "sign", "task", "address_book"];
                    if (1 === e.admin)
                        for (var t = 0; t < i.length; t++) e[i[t]] = !0;
                    else
                        for (var n = 0; n < e.permission.length; n++) e[e.permission[n]] = !0
                }
            }
        }
    },
    736: function(e, i, t) {
        i = e.exports = t(73)(!0), i.i(t(477), ""), i.push([e.i, ".white-word[data-v-626c9f4a]{position:fixed;top:0;left:0;z-index:81;width:60vw;height:12vh;padding:8vh 20vw 0;position:relative}.white-content[data-v-626c9f4a]{position:fixed;top:0;left:0;z-index:82;width:70vw;height:15vh;padding:0 15vw;position:relative}.white-div[data-v-626c9f4a]{position:fixed;background-color:#fff;bottom:0;left:0;z-index:80;width:100vw;height:25vh}.welcome-Bottom[data-v-626c9f4a]{position:fixed;z-index:85;height:70px;bottom:0;left:0;right:0}", "", {
            version: 3,
            sources: ["/src/components/Welcome.vue"],
            names: [],
            mappings: "AAEA,6BACE,eAAgB,AAChB,MAAO,AACP,OAAQ,AACR,WAAY,AACZ,WAAY,AACZ,YAAa,AACb,mBAAyB,AACzB,iBAAmB,CACpB,AACD,gCACE,eAAgB,AAChB,MAAO,AACP,OAAQ,AACR,WAAY,AACZ,WAAY,AACZ,YAAa,AACb,eAAyB,AACzB,iBAAmB,CACpB,AACD,4BACE,eAAgB,AAChB,sBAAwB,AACxB,SAAU,AACV,OAAQ,AACR,WAAY,AACZ,YAAa,AACb,WAAa,CACd,AACD,iCACE,eAAgB,AAChB,WAAY,AACZ,YAAa,AACb,SAAY,AACZ,OAAU,AACV,OAAU,CACX",
            file: "Welcome.vue",
            sourcesContent: ['\n@import url("../css/mystyle.css");\n.white-word[data-v-626c9f4a] {\n  position: fixed;\n  top: 0;\n  left: 0;\n  z-index: 81;\n  width: 60vw;\n  height: 12vh;\n  padding: 8vh 20vw 0 20vw;\n  position: relative;\n}\n.white-content[data-v-626c9f4a] {\n  position: fixed;\n  top: 0;\n  left: 0;\n  z-index: 82;\n  width: 70vw;\n  height: 15vh;\n  padding: 0vh 15vw 0 15vw;\n  position: relative;\n}\n.white-div[data-v-626c9f4a] {\n  position: fixed;\n  background-color: white;\n  bottom: 0;\n  left: 0;\n  z-index: 80;\n  width: 100vw;\n  height: 25vh;\n}\n.welcome-Bottom[data-v-626c9f4a] {\n  position: fixed;\n  z-index: 85;\n  height: 70px;\n  bottom: 0px;\n  left: 0px;\n  right: 0px\n}\n\n'],
            sourceRoot: ""
        }])
    },
    802: function(e, i, t) {
        var n = t(736);
        "string" == typeof n && (n = [
            [e.i, n, ""]
        ]), n.locals && (e.exports = n.locals);
        t(476)("de3243a0", n, !0)
    },
    894: function(e, i, t) {
        e.exports = t.p + "static/img/welcome_content.1cd748f.png"
    },
    // 895: function(e, i) {
    //     e.exports = t.p + "static/img/welcome_logo.png"
    // },
    930: function(e, i, t) {
        e.exports = {
            render: function() {
                var e = this,
                    i = e.$createElement,
                    t = e._self._c || i;
                return t("div", {
                    staticStyle: {
                        "background-color": "#00A9EE",
                        height: "100%",
                        position: "relative"
                    }
                }, [t("div", {
                    staticClass: "white-div"
                }), e._v(" "), e._m(0), e._v(" "), e._m(1), e._v(" "), t("div", {
                    staticClass: "welcome-Bottom"
                }, [t("div", {
                    staticClass: "flex-container",
                    staticStyle: {
                        padding: "0px 50px 40px 50px",
                        "text-align": "center"
                    }
                }, [t("div", {
                    staticClass: "flex-primary",
                    staticStyle: {
                        color: "white",
                        "background-color": "#00A9EE",
                        height: "35px",
                        "border-radius": "17.5px",
                        "line-height": "35px",
                        "margin-right": "15px"
                    },
                    on: {
                        click: function(i) {
                            e.enterLogin()
                        }
                    }
                }, [e._v("登录")]), e._v(" "), t("div", {
                    staticClass: "flex-primary",
                    staticStyle: {
                        "background-color": "white",
                        height: "35px",
                        "border-radius": "17.5px",
                        "line-height": "35px",
                        border: "1px solid #00A9EE",
                        "margin-left": "15px"
                    },
                    on: {
                        click: function(i) {
                            e.enterExperience()
                        }
                    }
                }, [e._v("立即体验")])])])])
            },
            staticRenderFns: [function() {
                var e = this,
                    i = e.$createElement,
                    n = e._self._c || i;
                return n("div", {
                    staticClass: "white-word"
                }, [n("img", {
                    attrs: {
                        src: t(895),
                        width: "100%"
                    }
                })])
            }, function() {
                var e = this,
                    i = e.$createElement,
                    n = e._self._c || i;
                return n("div", {
                    staticClass: "white-content"
                }, [n("img", {
                    attrs: {
                        src: t(894),
                        width: "100%"
                    }
                })])
            }]
        }
    }
});
