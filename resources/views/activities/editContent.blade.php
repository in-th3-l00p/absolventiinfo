<x-admin.post-editor
    name="activity"
    :post="$activity"
    :updateRoute="route('activities.update.content', [ 'activity' => $activity ])"
/>
