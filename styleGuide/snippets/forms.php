<h3 class="chapterHeadline">Forms</h3>
<h4 class="chapterHeadline">Radios</h4>
<form role="form">
    <h5 class="chapterHeadline">Regular</h5>
    <div class="content">
        <div class="form-group">
            <label class="radio">
                <input type="radio" name="radio1" value="radio1">
                not checked
            </label>
            <label class="radio">
                <input  type="radio" name="radio2" value="radio2" checked="checked">
                checked
            </label>
            <label class="radio">
                <input  type="radio" name="radio3" value="radio3" disabled="disabeld">
                disabled
            </label>
        </div>
    </div>
    <h5 class="chapterHeadline">Error</h5>
    <div class="content">
        <div class="form-group error">
            <label class="radio">
                <input type="radio" name="radio4" value="radio4">
                not checked
            </label>
            <label class="radio">
                <input  type="radio" name="radio5" value="radio5" checked="checked">
                checked
            </label>
            <label class="radio">
                <input  type="radio" name="radio6" value="radio6" disabled="disabeld">
                disabled
            </label>
        </div>
    </div>
</form>
<form role="form">
    <h4 class="chapterHeadline">Checkboxes</h4>
    <div class="content">
        <div class="form-group">
            <label for="checkbox1">
                <input type="hidden" name="checkbox1" value="true" />
                <input type="checkbox" name="checkbox1" id="checkbox1" value="true" checked="checked"/> checked
            </label>
        </div>
        <div class="form-group">
            <label for="checkbox2">
                <input type="hidden" name="checkbox2" value="false" />
                <input type="checkbox" name="checkbox2" id="checkbox2" value="true"/> unchecked
            </label>
        </div>
        <div class="form-group error">
            <label for="checkbox3">
                <input type="hidden" name="checkbox3" value="false" />
                <input type="checkbox" name="checkbox3" id="checkbox3" value="true"/> unchecked & error
            </label>
        </div>
        <div class="form-group error">
            <label for="checkbox4">
                <input type="hidden" name="checkbox4" value="false" />
                <input type="checkbox" name="checkbox4" id="checkbox4" value="true" checked="checked"/> checked & error
            </label>
        </div>
        <div class="form-group">
            <label for="checkbox5" >
                <input type="hidden" name="checkbox5" value="false" />
                <input type="checkbox" name="checkbox5" id="checkbox5" value="true" disabled="disabled"/> disabled
            </label>
        </div>
        <div class="form-group">
            <label for="checkbox6" >
                <input type="hidden" name="checkbox6" value="false" />
                <input type="checkbox" name="checkbox6" id="checkbox6" value="true" disabled="disabled" checked="checked"/> disabled & checked
            </label>
        </div>
    </div>
</form>
<h4 class="chapterHeadline">Inputs</h4>
<form role="form">
    <div class="content">
        <h5 class="chapterHeadline">Default</h5>
        <div class="form-group">
            <label for="input1">Input-Lg Label</label>
            <input class="form-control input-lg" id="input1" name="input1" type="text" placeholder=".input-lg">
        </div>
        <div class="form-group">
            <label for="input2">Default Label</label>
            <input type="text" class="form-control" id="input2" placeholder="Default input">
        </div>
        <div class="form-group">
            <label for="input3">Input-SM Label</label>
            <input class="form-control input-sm" id="input3" type="text" placeholder=".input-sm">
        </div>
        <div class="form-group">
            <label for="input4">Disabled Input Label</label>
            <input class="form-control input-sm" id="input4" type="text" placeholder=".input-sm disabled" disabled="disabled">
        </div>
    </div>
    <h5 class="chapterHeadline">Error</h5>
    <div class="content">
        <div class="form-group has-error has-feedback">
            <label class="control-label" for="inputError2">Input with error</label>
            <input type="text" class="form-control" id="inputError2">
        </div>
    </div>
</form>
<h4 class="chapterHeadline">Select</h4>
<form role="form">
    <h5 class="chapterHeadline">Default</h5>
    <div class="content">
        <select class="form-control">
            <option value="Default select 1">Default select 1</option>
            <option value="Default select 2">Default select 2</option>
            <option value="Default select 3">Default select 3</option>
        </select>
    </div>
    <h5 class="chapterHeadline">Error</h5>
    <div class="content">
        <div class="form-group has-error has-feedback">
            <select class="form-control">
                <option value="Default select 1">Default select 1</option>
                <option value="Default select 2">Default select 2</option>
                <option value="Default select 3">Default select 3</option>
            </select>
        </div>
    </div>
</form>
