<?php

function paginate($current_page, $total_records, $records_per_page, $base_url)
{
    $total_pages = ceil($total_records / $records_per_page);

    $pagination_html = '<div class="pagination">';

    if ($current_page > 1) {
        $prev_page = $current_page - 1;
        $pagination_html .= '<a href="' . $base_url . '?page=' . $prev_page . '">Previous</a>';
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            $pagination_html .= '<span class="current">' . $i . '</span>';
        } else {
            $pagination_html .= '<a href="' . $base_url . '?page=' . $i . '">' . $i . '</a>';
        }
    }

    if ($current_page < $total_pages) {
        $next_page = $current_page + 1;
        $pagination_html .= '<a href="' . $base_url . '?page=' . $next_page . '">Next</a>';
    }

    $pagination_html .= '</div>';

    return $pagination_html;
}

function fetchData($query, $connect) {
    $result = mysqli_query($connect, $query);
    if ($result) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } else {
        echo "Error executing query: " . mysqli_error($connect);
        return false;
    }
}
?>
