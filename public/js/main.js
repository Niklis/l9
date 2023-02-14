// var app_config = {
//     root: document.body,
//     mobileModeWidth: 992,
//     isWebkit: !0 == (!!window.chrome && !!window.chrome.webstore) || 0 < Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor") == !0,
//     isChrome: /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()),
//     isIE: 0 < window.navigator.userAgent.indexOf("Trident/") == !0,
//     isMobile: /iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()),

// };
var nklsApp = function () {
    var appState_defaults = {
        mobileModeWidth: 992,
        showTopMenu: true,
        showSidebar: true,
        showUserMenu: true,
    };

    var appState = { ...appState_defaults, ...(getLocalStorageAppState() || {}) };

    __logs && console.log('Loaded app-state: ', appState);

    var init = function (options) {
        appState = {...appState, ...options};
        __logs && console.log('Init appState',appState);
        setLocalStorageAppState(appState);
    }

    init();

    var resetApp = function () {
        setLocalStorageAppState(appState_defaults);
    }

    var root = document.body;
    var mobileModeWidth = appState.mobileModeWidth;//992

    //App state
    function setLocalStorageAppState(state) {
        localStorage.setItem('app-state', JSON.stringify(state));
        __logs && console.log('Set app-state: ', JSON.stringify(state));
    }
    function getLocalStorageAppState() {
        let state;
        try {
            state = JSON.parse(localStorage.getItem('app-state'));
        } catch (e) {
            __logs && console.log('Get app-state err: ', e);
            return e;
        }
        // __logs && console.log('Get app-state: ', state);
        return state;
    }

    // return {
    //     init:init,
    //     resetApp:resetApp,
    //     appState:appState
    // }

    //Detect mobile mode
    window.addEventListener('resize', event => {
        let width = window.innerWidth;
        if (width <= mobileModeWidth && !root.classList.contains('mobile-mode'))
            root.classList.add('mobile-mode');
        else if (width > mobileModeWidth && root.classList.contains('mobile-mode'))
            root.classList.remove('mobile-mode');
    }, true);

    window.addEventListener('DOMContentLoaded', event => {
        Toastify({
            text: "Welcome!",
            duration: 3000
        }).showToast();

        // CurrentState:NextState
        const sidebarTransitions = {
            'sidebar--close': 'sidebar--open',
            'sidebar--open': 'sidebar--hidden',
            'sidebar--hidden': 'sidebar--close',
        };
        const sidebarStateIcons = {
            'sidebar--close': 'bi bi-text-indent-left fs-4',
            'sidebar--open': 'bi bi-text-indent-right fs-4',
            'sidebar--hidden': 'bi bi-text-indent-right fs-4',
        };

        //set icon onLoad
        root.querySelector('#sidebarToggler > i').className = sidebarStateIcons[localStorage.getItem('sidebar-state')];

        //Sidebar
        const sidebar = root.querySelector('#sidebar');
        const sidebarToggler = root.querySelector('#sidebarToggler');

        sidebarToggler.addEventListener('click', event => {
            event.preventDefault();
            // set state
            setSideBarState(sidebarTransitions[localStorage.getItem('sidebar-state')]);
            //set icon
            root.querySelector('#sidebarToggler > i').className = sidebarStateIcons[localStorage.getItem('sidebar-state')];
        });

        sidebar.onmouseenter = function (event) {
            if (!root.classList.contains('sidebar--hidden')) return;
            root.classList.toggle('sidebar--hidden_open');
        };
        sidebar.onmouseleave = function (event) {
            if (!root.classList.contains('sidebar--hidden')) return;
            root.classList.toggle('sidebar--hidden_open');
        };

        //Sidebar menu
        document.querySelectorAll('.sidebar__nav .nav-link').forEach(function (element) {
            element.addEventListener('click', function (e) {
                let nextEl = element.nextElementSibling;
                let parentEl = element.parentElement;

                if (nextEl) {
                    e.preventDefault();
                    let mycollapse = new bootstrap.Collapse(nextEl);
                    if (nextEl.classList.contains('show')) {
                        mycollapse.hide();
                    } else {
                        // find other submenus with class=show
                        var opened_submenus = parentEl.parentElement.querySelectorAll('.submenu.show');
                        // if it exists, then close all of them
                        opened_submenus && opened_submenus.forEach(item => {
                            item.previousElementSibling.classList.toggle('nav-link--open');
                            new bootstrap.Collapse(item);
                        });
                        element.classList.toggle('nav-link--open');
                        mycollapse.show();
                    }
                }
            });
        });
        //Top menu
        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {
            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
                element.addEventListener('click', function (e) {
                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        if (nextEl.style.display == 'block') {
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }
                    }
                });
            })
        }

        //Mobile-offcanvas
        // function darken_screen(yesno) {
        //     if (yesno == true) {
        //         document.querySelector('.screen-darken').classList.add('active');
        //     }
        //     else if (yesno == false) {
        //         document.querySelector('.screen-darken').classList.remove('active');
        //     }
        // }

        // function close_offcanvas() {
        //     darken_screen(false);
        //     document.querySelector('.mobile-offcanvas.show').classList.remove('show');
        //     document.body.classList.remove('offcanvas-active');
        // }

        // function show_offcanvas(offcanvas_id) {
        //     darken_screen(true);
        //     document.getElementById(offcanvas_id).classList.add('show');
        //     document.body.classList.add('offcanvas-active');
        // }
        // document.querySelectorAll('[data-trigger]').forEach(function (el) {
        //     let offcanvas_id = el.getAttribute('data-trigger');
        //     el.addEventListener('click', function (e) {
        //         e.preventDefault();
        //         show_offcanvas(offcanvas_id);
        //     });
        // });

        // document.querySelectorAll('.mobile-offcanvas .btn-close').forEach(function (everybutton) {
        //     everybutton.addEventListener('click', function (e) {
        //         close_offcanvas();
        //     });
        // });

        // document.querySelector('.screen-darken').addEventListener('click', function (event) {
        //     close_offcanvas();
        // });

        //Other  
        function getSystemDefaultTheme() {
            const darkThemeMq = window.matchMedia('(prefers-color-scheme: dark)');//переделать в одну строку
            if (darkThemeMq.matches) return 'dark';
            return 'light';
        }
    });

    return {
        // declare which properties and methods are supposed to be public
        init: init,
        // changeColor: changeColor
    }
}();
