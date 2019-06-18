<div class="panel-group">

    <div class="panel panel-default">
        <form>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                        <div class="col-sm-2">
                            <select class="country search-input-select form-control input-sm" id="country"
                                    data-column="7">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <select class="province search-input-select form-control input-sm" data-column="8"
                                    id="bprovince">
                                <option value="">Select Province</option>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <select class="city search-input-select form-control input-sm" data-column="9"
                                    id="city">
                                <option value="">Select City</option>


                            </select>
                        </div>

                        <div class="col-sm-2">
                            <select class="branch search-input-select form-control input-sm" data-column="0">
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)

                                    <option>{{$branch->name}}</option>
                                @endforeach

                            </select>
                        </div>

                    @endif

                    <div class="col-sm-2">
                        <select class="gender search-input-select form-control input-sm" data-column="4"
                                id="gender">
                            <option value="">Select Gender</option>

                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    {{-- Regions --}}
                    <div class="col-sm-2">
                        <select class="marital search-input-select form-control input-sm" data-column="12"
                                id="marital">
                            <option value="">Marital Status</option>
                            @foreach($marital_statuses as $marital)
                                <option>{{$marital->title}}</option>
                            @endforeach

                        </select>
                    </div>
                    {{-- Province --}}

                    {{-- church languages --}}
                    <div class="col-sm-2">
                        <select class="form-control input-sm"  id="language" name="language">
                            <option value="">Select languages</option>
                            @foreach($languages as $langauge)
                                <option>{{$langauge->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Position--}}
                    <div class="col-sm-2">
                        <select class="search-input-select form-control input-sm" data-column="19" id="position">
                            <option value="">Select Position</option>

                            @foreach($positions as $position)
                                <option>{{$position->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="econ search-input-select form-control input-sm" data-column="13"
                                id="econ">
                            <option value="">Economic Status</option>

                            @foreach($economic_statuses as $econ)
                                <option>{{$econ->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="proffession search-input-select form-control input-sm" data-column="14"
                                id="profession">
                            <option value="">Select Profession</option>
                            @foreach($careers as $proff)
                                <option>{{$proff->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="sub search-input-select form-control input-sm" data-column="10"
                                id="status">
                            <option value="">Select Status</option>
                            @foreach($statuses as $status)
                                <option>{{$status->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="sub search-input-select form-control input-sm" data-column="11"
                                id="sub_status">
                            <option value="">Select Sub-Status</option>


                        </select>
                    </div>


                    <div class="col-sm-2">
                        <select class="group search-input-select form-control input-sm" data-column="5"
                                id="group">
                            <option value="">Select Group</option>
                            @foreach($groups as $group)
                                <option>{{$group->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="current_state search-input-select form-control input-sm" data-column="15"
                                id="current_state">
                            <option value="">Select Current State</option>
                            @foreach($current_states as $current_state)
                                <option>{{$current_state->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="dept search-input-select form-control input-sm" data-column="16"
                                id="dept">
                            <option value="">Select Department</option>

                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(Auth::check() && Auth::user()->hasRole('branch')  OR Auth::check() && Auth::user()->hasRole('province super admin')
                                            OR Auth::check() && Auth::user()->hasRole('branch super admin'))
                        <div class="col-sm-2">
                            <select class="cellgroup search-input-select form-control input-sm" data-column="6">
                                <option value="">Select CellGroup</option>

                                @foreach($cell_groups as $cell)
                                    <option>{{$cell->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif




                    {{--<div class="col-sm-2">--}}
                    {{--<input type="date" name="wedding_anniversary" placeholder="Wedding Anniversary">--}}
                    {{--</div>--}}

                    <div class="col-sm-2">
                        <select class="disability search-input-select form-control input-sm" data-column="18">
                            <option value="">Select Disability</option>
                            @foreach($disabilities as $dis)
                                <option>{{$dis->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="search-input-select form-control input-sm" data-column="21"
                                id="fellowship" name="fellowship">
                            <option value="">Year of Fellowship</option>
                            @for($i=0;$i<100;$i++)
                                <option @if (date("Y", strtotime("-$i years"))===old('fellowship')) selected @endif>{{date("Y", strtotime("-$i years"))}}</option>
                            @endfor

                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="search-input-select form-control input-sm" data-column="22" id="repented"
                                name="repented">

                            <option value="">Year Repented</option>
                            @for($i=0;$i<100;$i++)
                                <option @if (date("Y", strtotime("-$i years"))===old('repented')) selected @endif >{{date("Y", strtotime("-$i years"))}}</option>
                            @endfor


                        </select>

                    </div>

                    <div class="col-sm-2">
                        <select class="gift search-input-select form-control input-sm" data-column="17">
                            <option value="">Select Gift</option>

                            @foreach($gifts as $gift)
                                <option>{{$gift->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="sp search-input-select form-control input-sm" data-column="20" id="sp">
                            <option value="">Select Sporting Activity</option>

                            @foreach($sporting_activities as $sp)
                                <option>{{$sp->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-inline">
                            {{--<label>Date Range</label>--}}
                            <div class="input-group">
                                <div data-min-view="2" data-date-format="yyyy-mm-dd"
                                     class="input-group date datetimepicker col-md-6">
                                    <input size="16" type="date" value="" name="min" placeholder="Date From"
                                           class="form-control input-sm"><span
                                            class="input-group-addon btn btn-primary"><i
                                                class="icon-th s7-date"></i></span>
                                </div>
                                <div data-min-view="2" data-date-format="yyyy-mm-dd"
                                     class="input-group date datetimepicker col-md-6">
                                    <input size="16" type="date" value="" placeholder="Date To" name="max"
                                           id="search-date" class="form-control input-sm"><span
                                            class="input-group-addon btn btn-primary"><i
                                                class="icon-th s7-date"></i></span>
                                </div>
                            </div>


                        </div>

                    </div>


                </div>
                <div class="panel-footer reset1"><input type="reset" value="Reset" class="btn btn-primary"
                                                        id="reset1"/></div>
            </div>
        </form>
    </div>
    {{-- form end --}}
</div>