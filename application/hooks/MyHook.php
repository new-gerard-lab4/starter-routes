<?php

/**
 * Created by PhpStorm.
 * User: gerard
 * Date: 2016-10-01
 * Time: 9:25 AM
 */
class MyHook
{
    /**
     * Loads an HTML and references a CI object to it. Modify the element if it is of class lead
     */
    function censor() {
        // CI superojbect has access to the webpage
        $this->CI =& get_instance();
        $page = $this->CI->output->get_output();

        // Creates new DOMDocument and loads HTML to webpage
        $dom = new DOMDocument();
        $dom ->loadHTML($page);

        // Loop through a list of all <p> elements
        foreach($dom->getElementsByTagName('p') as $element) {
            // Modify if class is lead
            if($element->getAttribute('class') == 'lead') {
                $temp = $element->textContent;
                $sentence = $this->parse_content(explode(' ', $temp), $dom);
                $this->edit_elements($element, $sentence);
            }
        }
        echo $dom->saveHTML();
    }

    /**
     * Edit an HTML element by inserting new elements into it, whether they
     * are in example tags or bold tags.
     * @param DOMNode $element An HTML element to have new elements inserted into it, to put capitalized words into a bold tag.
     * @param DOMElement[] $sentence A list of HTML elements to be inserted into the original DOMNode.
     */
    function edit_elements($element, $sentence)
    {
        $element->nodeValue = '';
        foreach($sentence as $node)
        {
            // Appends a new HTML element at the end of the old one
            $element->appendChild($node);
        }
    }

    /**
     * Takes in all the words in an HTML element. If any start with a capital
     * letter and are not a digit they are put into an HTML bold tag, and if
     * not, it is put into an example tag so there is no formatting on that
     * word.
     *
     * @param string[] $words All of the words inside of an HTML element.
     * @param DOMDocument $dom The HTML code of the page.
     * @return DOMElement[] A list of HTML elements to be inserted into the original DOMNode.
     */
    function parse_content($words, $dom)
    {
        foreach($words as $word)
        {
            $node = $dom->createElement("example", $word . ' ');
            $word = preg_replace('/[^a-zA-Z]/','',$word);
            if(strlen($word) == 4 && preg_match('/([a-zA-Z]{4})/',$word) == 1)
                $node = $dom->createElement("any", '****' . ' ');
            $sentence[] = $node;
        }
        return $sentence;
    }

}