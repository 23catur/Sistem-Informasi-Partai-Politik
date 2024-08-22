<?php

// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('criterias.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kriteria', route('criterias.index'));
});

Breadcrumbs::for('criterias.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kriteria', route('criterias.index'));
    $trail->push('Tambah', route('criterias.create'));
});

Breadcrumbs::for('criterias.show', function (BreadcrumbTrail $trail, Criteria $criteria) {
    $trail->parent('dashboard');
    $trail->push('Kriteria', route('criterias.index'));
    $trail->push('Detail', route('criterias.show', $criteria));
});

Breadcrumbs::for('criterias.edit', function (BreadcrumbTrail $trail, Criteria $criteria) {
    $trail->parent('dashboard');
    $trail->push('Kriteria', route('criterias.index'));
    $trail->push('Edit', route('criterias.edit', $criteria));
});

Breadcrumbs::for('sub-criterias.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kriteria', route('criterias.index'));
    $trail->push('Sub', route('criterias.show', request('criteria_id')));
    $trail->push('Tambah', route('sub-criterias.create', ['criteria_id' => request('criteria_id')]));
});

Breadcrumbs::for('sub-criterias.edit', function (BreadcrumbTrail $trail, SubCriteria $subCriteria) {
    $trail->parent('dashboard');
    $trail->push('Kriteria', route('criterias.index'));
    $trail->push('Sub', route('criterias.show', $subCriteria->criteria_id));
    $trail->push('Edit', route('sub-criterias.edit', $subCriteria));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengguna', route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengguna', route('users.index'));
    $trail->push('Tambah', route('users.create'));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('dashboard');
    $trail->push('Pengguna', route('users.index'));
    $trail->push('Detail', route('users.show', $user));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('dashboard');
    $trail->push('Pengguna', route('users.index'));
    $trail->push('Edit', route('users.edit', $user));
});

Breadcrumbs::for('alternatives.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Alternatif', route('alternatives.index'));
});

Breadcrumbs::for('alternatives.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Alternatif', route('alternatives.index'));
    $trail->push('Tambah', route('alternatives.create'));
});

Breadcrumbs::for('alternatives.show', function (BreadcrumbTrail $trail, Alternative $alternative) {
    $trail->parent('dashboard');
    $trail->push('Pengguna', route('alternatives.index'));
    $trail->push('Detail', route('alternatives.show', $alternative));
});

Breadcrumbs::for('alternatives.edit', function (BreadcrumbTrail $trail, Alternative $alternative) {
    $trail->parent('dashboard');
    $trail->push('Alternatif', route('alternatives.index'));
    $trail->push('Edit', route('alternatives.edit', $alternative));
});

Breadcrumbs::for('alternatives.assesments.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Penilaian Alternatif', route('alternatives.assesments.index'));
});

Breadcrumbs::for('alternatives.assesments.edit', function (BreadcrumbTrail $trail, Alternative $alternative) {
    $trail->parent('dashboard');
    $trail->push('Penilaian Alternatif', route('alternatives.assesments.index'));
    $trail->push($alternative->name, route('alternatives.assesments.edit', $alternative));
});

Breadcrumbs::for('algorithm.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Rekomendasi Alternatif', route('algorithm.index'));
});

Breadcrumbs::for('algorithm.result', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Hasil Rekomendasi', route('algorithm.result'));
});

Breadcrumbs::for('users.change_password.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Ubah Kata Sandi', route('users.change_password.index'));
});

Breadcrumbs::for('users.profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile '.auth()->user()->name, route('users.profile.index'));
});

Breadcrumbs::for('users.profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('users.profile.index'));
    $trail->push('Edit', route('users.profile.edit'));
});

Breadcrumbs::for('alternatives.address.create', function (BreadcrumbTrail $trail, Alternative $alternative) {
    $trail->parent('dashboard');
    $trail->push('Alternatif', route('alternatives.index'));
    $trail->push($alternative->name, route('alternatives.show', $alternative));
    $trail->push('Address Form', route('alternatives.address.create', $alternative));
});

Breadcrumbs::for('alternatives.criteria-component.index', function (BreadcrumbTrail $trail, Alternative $alternative) {
    $trail->parent('dashboard');
    $trail->push('Alternatif', route('alternatives.index'));
    $trail->push($alternative->name, route('alternatives.show', $alternative));
    $trail->push('Komponen Kriteria', route('alternatives.criteria-component.index', $alternative));
});

Breadcrumbs::for('alternatives.documents.index', function (BreadcrumbTrail $trail, Alternative $alternative) {
    $trail->parent('dashboard');
    $trail->push('Alternatif', route('alternatives.index'));
    $trail->push($alternative->name, route('alternatives.show', $alternative));
    $trail->push('Dokumen', route('alternatives.documents.index', $alternative));
});

Breadcrumbs::for('periods.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Period', route('periods.index'));
});
