<div class="offcanvas offcanvas-end" tabindex="-1" id="settings-menu" aria-labelledby="settings-menu-label">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="settings-menu-label">Settings</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-2">
        {{-- <p>Content</p> --}}
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="settings-title-1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#settings-item-1" aria-expanded="true" aria-controls="settings-item-1">
                        Dashboard
                    </button>
                </h2>
                <div id="settings-item-1" class="accordion-collapse collapse show" aria-labelledby="settings-title-1">
                    <div class="accordion-body">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Menu on top</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                input</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="settings-title-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#settings-item-2" aria-expanded="false"
                        aria-controls="settings-item-2">
                        Theme & colors
                    </button>
                </h2>
                <div id="settings-item-2" class="accordion-collapse collapse"
                    aria-labelledby="settings-title-2">
                    <div class="accordion-body">
                        Theme & colors
                        Theme & colors
                        Theme & colors
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="settings-title-3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#settings-item-3" aria-expanded="false"
                        aria-controls="settings-item-3">
                        Аккордеонный элемент #3
                    </button>
                </h2>
                <div id="settings-item-3" class="accordion-collapse collapse"
                    aria-labelledby="settings-title-3">
                    <div class="accordion-body">
                        <strong>Это тело аккордеона третьего элемента.</strong> По умолчанию он скрыт, пока плагин
                        свертывания не добавит соответствующие классы, которые мы используем для стилизации каждого
                        элемента. Эти классы управляют общим внешним видом, а также отображением и скрытием с помощью
                        переходов CSS. Вы можете изменить все это с помощью собственного CSS или переопределить наши
                        переменные по умолчанию. Также стоит отметить, что практически любой HTML может быть помещен в
                        <code>.accordion-body</code>, хотя переход ограничивает переполнение.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
