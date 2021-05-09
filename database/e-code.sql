-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 01:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-code`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `code_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `code` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`code_id`, `title`, `code`) VALUES
(11, 'C++ Boilerplate', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nint main(){\r\n\r\n    cout &lt;&lt; &quot;Hurrah!&quot;;\r\n\r\n	return 0;\r\n\r\n}'),
(16, 'Linear Search', '#include &lt;iostream&gt;\nusing namespace std;\n\n// Time complexity O(n)\nint linearSearch(int arr[], int size, int k){\n    int i;\n    for(i=0; i&lt;size; i++){\n        if(arr[i] == k){ // element found\n            return i+1;\n        }\n    }\n    \n    return 0; // element not found\n}\n\nint main(){\n    \n    int arr[] = {10,20,30,40,50,60,70,80,90,100};\n    int size = 10;\n    int k = 70;\n    \n    int pos = linearSearch(arr, size, k); // returns the position of element in array\n    if(pos != 0)\n        cout &lt;&lt; &quot;Element found at position : &quot; &lt;&lt; pos;\n    else cout &lt;&lt; &quot;Element not found!&quot;;\n    \n    return 0;\n}'),
(17, 'Binary Search', '#include &lt;iostream&gt;\n#include &lt;algorithm&gt;\nusing namespace std;\n\n// Time complexity O(log n)\nint binarySearch(int arr[], int left, int right, int k){\n    \n    if(left &gt; right) // element not found\n        return 0; \n    \n    int mid = (left + right)/2;\n    \n    if(arr[mid] == k) // element found\n        return mid + 1;\n    \n    if(arr[mid] &gt; k) // element present in left part of the array\n        binarySearch(arr, left, mid-1, k); \n    else binarySearch(arr, mid+1, right, k); // element present in the right part of the array\n    \n    \n}\n\nint main(){\n    \n    // array must be sorted for binary search\n    int arr[] = {10,20,30,40,50,60,70,80,90,100};\n    int size = 10;\n    int k = 700; // element to search in array\n    \n    sort(arr, arr + size);\n    \n    int pos = binarySearch(arr, 0, size - 1, k); // returns the position of element in array\n    if(pos != 0)\n        cout &lt;&lt; &quot;Element found at position : &quot; &lt;&lt; pos;\n    else cout &lt;&lt; &quot;Element not found!&quot;;\n    \n    return 0;\n}'),
(18, 'Bubble Sort', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nvoid printArray(int arr[], int size){\r\n    cout &lt;&lt; &quot;Array : &quot;;\r\n    for(int i=0; i&lt;size; i++)\r\n        cout &lt;&lt; arr[i] &lt;&lt; &quot; &quot;;\r\n    cout &lt;&lt; endl;\r\n}\r\n\r\n// Time Complexity O(n2)\r\nvoid bubbleSort(int arr[], int size){ // sort array in ascending order\r\n    int i, j;\r\n    int temp;\r\n    for(i=0; i &lt; size - 1; i++){\r\n        for(j=0; j &lt; size - i - 1; j++){\r\n            if(arr[j] &gt; arr[j+1]){ // swap\r\n                temp = arr[j];\r\n                arr[j] = arr[j+1];\r\n                arr[j+1] = temp;\r\n            }\r\n        }\r\n    }\r\n}\r\n\r\nint main(){\r\n\r\n    int arr[] = {17,1,6,19,0,25,3,85,45,27};\r\n    int size = 10;\r\n    \r\n    printArray(arr, size);\r\n    \r\n    cout &lt;&lt; &quot;After Bubble Sort&quot; &lt;&lt; endl;\r\n    bubbleSort(arr, size);\r\n\r\n    printArray(arr, size);\r\n\r\n	return 0;\r\n\r\n}'),
(19, 'Swap numbers without using temporary variable', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\n// swap numbers without using temporary variable\r\n\r\nint main(){\r\n    int a = 10, b = 30;\r\n    cout &lt;&lt; &quot;a : &quot; &lt;&lt; a &lt;&lt; &quot;, b : &quot; &lt;&lt; b &lt;&lt; endl;\r\n    \r\n    a = a + b;\r\n    b = a - b;\r\n    a = a - b;\r\n    \r\n    cout &lt;&lt; &quot;a : &quot; &lt;&lt; a &lt;&lt; &quot;, b : &quot; &lt;&lt; b &lt;&lt; endl;\r\n    \r\n	return 0;\r\n\r\n}'),
(20, 'Maximum element in array', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\n// Time complexity O(n)\r\nint maximumElemntInArray(int arr[], int size){\r\n    int max = arr[0];\r\n    for(int i=1; i&lt;size; i++){\r\n        if(arr[i] &gt; max) // update max\r\n            max = arr[i];\r\n    }\r\n    \r\n    return max;\r\n}\r\n\r\nint main(){\r\n    \r\n    int arr[] = {17,1,6,19,0,25,3,85,45,27};\r\n    int size = 10;\r\n    \r\n    int max = maximumElemntInArray(arr, size);\r\n    cout &lt;&lt; &quot;Maximum element in array : &quot; &lt;&lt; max;\r\n    \r\n	return 0;\r\n\r\n}'),
(21, 'Second largest element in array {Efficient Method}', '#include &lt;iostream&gt;\r\n#include &lt;climits&gt;\r\nusing namespace std;\r\n\r\n// Time complexity O(n)\r\nint secondLargestInArray(int arr[], int size){\r\n    int max = arr[0];\r\n    int sec_max = INT_MIN;\r\n    for(int i=1; i&lt;size; i++){\r\n        if(arr[i] &gt; max){ // update sec_max by max and update max by arr[i]\r\n            sec_max = max;\r\n            max = arr[i];\r\n        }\r\n        else if(arr[i] &gt; sec_max) // if arr[i] less than max but greater than sec_max\r\n            sec_max = arr[i];\r\n    }\r\n    return sec_max;\r\n}\r\n\r\nint main(){\r\n    \r\n    int arr[] = {17,1,6,19,0,25,3,85,45,27};\r\n    int size = 10;\r\n    \r\n    \r\n    int sec_max = secondLargestInArray(arr, size);\r\n    cout &lt;&lt; &quot;Second Maximum element in array : &quot; &lt;&lt; sec_max;\r\n    \r\n	return 0;\r\n\r\n}'),
(22, 'Samarth Challenge', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nvoid printArray(int arr[], int size){\r\n    cout &lt;&lt; &quot;Array : &quot;;\r\n    for(int i=0; i&lt;size; i++)\r\n        cout &lt;&lt; arr[i] &lt;&lt; &quot; &quot;;\r\n    cout &lt;&lt; endl;\r\n}\r\n\r\nvoid bubbleSort(int arr[], int size){ // sort array in ascending order\r\n    int i, j;\r\n    int temp;\r\n    for(i=0; i &lt; size - 1; i++){\r\n        for(j=0; j &lt; size - i - 1; j++){\r\n            if(arr[j] &gt; arr[j+1]){ // swap\r\n                temp = arr[j];\r\n                arr[j] = arr[j+1];\r\n                arr[j+1] = temp;\r\n            }\r\n        }\r\n    }\r\n}\r\n\r\n\r\nint numberOfDigits(int num){\r\n    int count = 0;\r\n    \r\n    while(num &gt; 0){\r\n        num /= 10;\r\n        count++;\r\n    }\r\n    \r\n    return count;\r\n}\r\n\r\nvoid fillArrayWithDigits(int arr[], int n, int num){\r\n    int k = n-1;\r\n    while(num &gt; 0){\r\n        arr[k--] = num % 10;\r\n        num /= 10;\r\n    }\r\n}\r\n\r\nint main(){\r\n    \r\n    int num = 3322251;\r\n    \r\n    int n = numberOfDigits(num);\r\n    \r\n    int arr[n];\r\n    // fill array with digits of number\r\n    fillArrayWithDigits(arr, n, num);\r\n    printArray(arr, n);\r\n    \r\n    // sort array\r\n    bubbleSort(arr, n);\r\n    printArray(arr, n);\r\n    \r\n    int max = arr[n-1];\r\n    \r\n    int occurrence[max + 1];\r\n    int i;\r\n    for(i=0; i&lt;max+1; i++)\r\n        occurrence[i] = 0;\r\n    \r\n    for(i=0; i&lt;n; i++){\r\n        occurrence[arr[i]]++;\r\n    }\r\n    cout &lt;&lt; &quot;occurrence array : &quot;;\r\n    printArray(occurrence, max+1);\r\n    int sum = 0;\r\n    for(i=0; i&lt;max + 1; i++){\r\n        if(occurrence[i] != 0)\r\n            sum += 10*occurrence[i] + i;\r\n    }\r\n    cout &lt;&lt; &quot;Sum : &quot; &lt;&lt; sum;\r\n    \r\n	return 0;\r\n\r\n}'),
(23, 'Testing runtime input', '#include &lt;iostream&gt;\nusing namespace std;\nint main(){\n    \n    int i, arr[10], sum = 0;\n    for(i = 0; i&lt;10; i++){\n        cin &gt;&gt; arr[i];\n        cout &lt;&lt; arr[i] &lt;&lt; &quot;, &quot;;\n        sum += arr[i];\n    }\n    cout &lt;&lt; endl;\n    cout &lt;&lt; &quot;Sum : &quot; &lt;&lt; sum &lt;&lt;endl;\n    cout &lt;&lt; &quot;Hurrah!&quot;;\n    return 0;\n    \n}'),
(24, 'Reference Compiler', 'https://www.youtube.com/watch?v=CsD6bX10i20\n\nhttps://github.com/sudeepmanasali/Online-Exam-Compiler-Php-project-/blob/master/copilers/my%20compiler/compilers/cpp.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
