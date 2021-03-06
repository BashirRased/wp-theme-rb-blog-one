!(function (e, t) {
    var n,
        r,
        a = e.html5 || {},
        o = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
        i = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
        c = "_html5shiv",
        l = 0,
        s = {};
    function m(e, t) {
        var n = e.createElement("p"),
            r = e.getElementsByTagName("head")[0] || e.documentElement;
        return (n.innerHTML = "x<style>" + t + "</style>"), r.insertBefore(n.lastChild, r.firstChild);
    }
    function u() {
        var e = p.elements;
        return "string" == typeof e ? e.split(" ") : e;
    }
    function d(e) {
        var t = s[e[c]];
        return t || ((t = {}), l++, (e[c] = l), (s[l] = t)), t;
    }
    function h(e, n, a) {
        return (
            n || (n = t),
            r
                ? n.createElement(e)
                : (a || (a = d(n)), !(c = a.cache[e] ? a.cache[e].cloneNode() : i.test(e) ? (a.cache[e] = a.createElem(e)).cloneNode() : a.createElem(e)).canHaveChildren || o.test(e) || c.tagUrn ? c : a.frag.appendChild(c))
        );
        var c;
    }
    function f(e) {
        e || (e = t);
        var a = d(e);
        return (
            !p.shivCSS || n || a.hasCSS || (a.hasCSS = !!m(e, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),
            r ||
                (function (e, t) {
                    t.cache || ((t.cache = {}), (t.createElem = e.createElement), (t.createFrag = e.createDocumentFragment), (t.frag = t.createFrag())),
                        (e.createElement = function (n) {
                            return p.shivMethods ? h(n, e, t) : t.createElem(n);
                        }),
                        (e.createDocumentFragment = Function(
                            "h,f",
                            "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" +
                                u()
                                    .join()
                                    .replace(/[\w\-:]+/g, function (e) {
                                        return t.createElem(e), t.frag.createElement(e), 'c("' + e + '")';
                                    }) +
                                ");return n}"
                        )(p, t.frag));
                })(e, a),
            e
        );
    }
    !(function () {
        try {
            var e = t.createElement("a");
            (e.innerHTML = "<xyz></xyz>"),
                (n = "hidden" in e),
                (r =
                    1 == e.childNodes.length ||
                    (function () {
                        t.createElement("a");
                        var e = t.createDocumentFragment();
                        return void 0 === e.cloneNode || void 0 === e.createDocumentFragment || void 0 === e.createElement;
                    })());
        } catch (e) {
            (n = !0), (r = !0);
        }
    })();
    var p = {
        elements: a.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
        version: "3.7.3",
        shivCSS: !1 !== a.shivCSS,
        supportsUnknownElements: r,
        shivMethods: !1 !== a.shivMethods,
        type: "default",
        shivDocument: f,
        createElement: h,
        createDocumentFragment: function (e, n) {
            if ((e || (e = t), r)) return e.createDocumentFragment();
            for (var a = (n = n || d(e)).frag.cloneNode(), o = 0, i = u(), c = i.length; o < c; o++) a.createElement(i[o]);
            return a;
        },
        addElements: function (e, t) {
            var n = p.elements;
            "string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), (p.elements = n + " " + e), f(t);
        },
    };
    (e.html5 = p), f(t);
    var v,
        g = /^$|\b(?:all|print)\b/,
        E = "html5shiv",
        y = !(r || ((v = t.documentElement), void 0 === t.namespaces || void 0 === t.parentWindow || void 0 === v.applyElement || void 0 === v.removeNode || void 0 === e.attachEvent));
    function b(e) {
        for (var t, n = e.attributes, r = n.length, a = e.ownerDocument.createElement(E + ":" + e.nodeName); r--; ) (t = n[r]).specified && a.setAttribute(t.nodeName, t.nodeValue);
        return (a.style.cssText = e.style.cssText), a;
    }
    function S(e) {
        var t,
            n,
            r = d(e),
            a = e.namespaces,
            o = e.parentWindow;
        if (!y || e.printShived) return e;
        function i() {
            clearTimeout(r._removeSheetTimer), t && t.removeNode(!0), (t = null);
        }
        return (
            void 0 === a[E] && a.add(E),
            o.attachEvent("onbeforeprint", function () {
                i();
                for (var r, a, o, c = e.styleSheets, l = [], s = c.length, d = Array(s); s--; ) d[s] = c[s];
                for (; (o = d.pop()); )
                    if (!o.disabled && g.test(o.media)) {
                        try {
                            a = (r = o.imports).length;
                        } catch (e) {
                            a = 0;
                        }
                        for (s = 0; s < a; s++) d.push(r[s]);
                        try {
                            l.push(o.cssText);
                        } catch (e) {}
                    }
                (l = (function (e) {
                    for (var t, n = e.split("{"), r = n.length, a = RegExp("(^|[\\s,>+~])(" + u().join("|") + ")(?=[[\\s,>+~#.:]|$)", "gi"), o = "$1" + E + "\\:$2"; r--; )
                        ((t = n[r] = n[r].split("}"))[t.length - 1] = t[t.length - 1].replace(a, o)), (n[r] = t.join("}"));
                    return n.join("{");
                })(l.reverse().join(""))),
                    (n = (function (e) {
                        for (var t, n = e.getElementsByTagName("*"), r = n.length, a = RegExp("^(?:" + u().join("|") + ")$", "i"), o = []; r--; ) (t = n[r]), a.test(t.nodeName) && o.push(t.applyElement(b(t)));
                        return o;
                    })(e)),
                    (t = m(e, l));
            }),
            o.attachEvent("onafterprint", function () {
                !(function (e) {
                    for (var t = e.length; t--; ) e[t].removeNode();
                })(n),
                    clearTimeout(r._removeSheetTimer),
                    (r._removeSheetTimer = setTimeout(i, 500));
            }),
            (e.printShived = !0),
            e
        );
    }
    (p.type += " print"), (p.shivPrint = S), S(t), "object" == typeof module && module.exports && (module.exports = p);
})("undefined" != typeof window ? window : this, document);
