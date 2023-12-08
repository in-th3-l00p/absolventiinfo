<x-admin.post-editor
    name="announcement"
    :post="$announcement"
    :updateRoute="route('announcements.update', [ 'announcement' => $announcement ])"
/>
