@extends('layouts.app')

<head>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
            width: 200px;
        }

        .dropdown-select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: white;
        }

        .dropdown-options {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            z-index: 1000;
        }

        .dropdown-options label {
            display: block;
            padding: 5px 10px;
            cursor: pointer;
        }

        .dropdown-options label:hover {
            background-color: #f0f0f0;
        }

        .dropdown-options input[type="checkbox"] {
            margin-right: 8px;
        }
    </style>
</head>
@section('content')
    <div class="pagetitle">
        <div class="row">
            <div class="col-sm-6">
                <h1>Assign Subject to Faculty</h1>
            </div>

        </div>
    </div>
    <section class="section">
        @include('common.errors')

        <div class="clearfix"></div>

        <form method="POST" action="{{ route('teachs.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold">Select Subject</label>
                <div class="col-sm-10">
                    <select class="form-select" name="sub_id" aria-label="State">
                        <option selected disabled value="Option...">Select...</option>
                        @foreach ($subject as $subjects)
                            <option value="{{ $subjects->id }}">{{ $subjects->sub_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold">Select Faculty</label>
                 <div class="dropdown col-sm-10">
                <div class="form-select" id="dropdownSelect">
                    Select options....
                </div>
                <div class="dropdown-options" id="dropdownOptions">
                    @foreach ($faculty as $facultys)
                        <label>
                            <input type="checkbox" value="{{ $facultys->id }}" name="faculty_id[]" data-name="{{ $facultys->name }}"> 
                            {{ $facultys->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            </div>

            <div class="">
                <button type="submit" class="btn btn-gray" id="bt" name="sbt">Save</button>
                <a href="{{ route('teachs.index') }}"><button type="button"
                        class="btn btn-secondary">Back</button></a>
            </div>

        </form>

        </div>
        </div>
        </div>
        </div>
    </section>

    <script>
       const dropdownSelect = document.getElementById("dropdownSelect");
        const dropdownOptions = document.getElementById("dropdownOptions");

        dropdownSelect.addEventListener("click", () => {
            dropdownOptions.style.display = dropdownOptions.style.display === "block" ? "none" : "block";
        });

        document.addEventListener("click", (e) => {
            if (!e.target.closest(".dropdown")) {
                dropdownOptions.style.display = "none";
            }
        });

        const checkboxes = dropdownOptions.querySelectorAll("input[type='checkbox']");
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", () => {
                const selectedOptions = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.getAttribute('data-name'));
                dropdownSelect.textContent = selectedOptions.length > 0 ? selectedOptions.join(", ") : "Select options";
            });
        });
    </script>
@endsection
