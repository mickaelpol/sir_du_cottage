<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* chantier/show.html.twig */
class __TwigTemplate_a042347c892f8dc4906e25dbb737429d188cf1946b252604649372f024cf63e6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "chantier/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "chantier/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "chantier/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    ";
        // line 5
        $context["nombreSuppTerrasse"] = 0;
        // line 6
        echo "    ";
        $context["nombreSuppParquet"] = 0;
        // line 7
        echo "
    ";
        // line 8
        $context["colspanTerrasse"] = 0;
        // line 9
        echo "    ";
        $context["colspanParquet"] = 0;
        // line 10
        echo "
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["chantier"] ?? $this->getContext($context, "chantier")), "biens", []));
        foreach ($context['_seq'] as $context["_key"] => $context["bien"]) {
            // line 12
            echo "        ";
            $context["nombreSuppTerrasse"] = twig_length_filter($this->env, $this->getAttribute($context["bien"], "supplementTerrasses", []));
            // line 13
            echo "        ";
            $context["colspanTerrasse"] = (4 + ($context["nombreSuppTerrasse"] ?? $this->getContext($context, "nombreSuppTerrasse")));
            // line 14
            echo "        ";
            $context["nombreSuppParquet"] = twig_length_filter($this->env, $this->getAttribute($context["bien"], "supplementParquets", []));
            // line 15
            echo "        ";
            $context["colspanParquet"] = (7 + ($context["nombreSuppParquet"] ?? $this->getContext($context, "nombreSuppParquet")));
            // line 16
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bien'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "
    ";
        // line 18
        $context["pourcentTd"] = (100 / ((($context["colspanParquet"] ?? $this->getContext($context, "colspanParquet")) + ($context["colspanTerrasse"] ?? $this->getContext($context, "colspanTerrasse"))) + 1));
        // line 19
        echo "
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            height: 50px;
        }

        td {
            width: ";
        // line 34
        echo twig_escape_filter($this->env, ($context["pourcentTd"] ?? $this->getContext($context, "pourcentTd")), "html", null, true);
        echo "%;
            height: auto;
        }
    </style>
    ";
        // line 38
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_start');
        echo "

    <h1>Chantier ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "nom", []), 'widget');
        echo "</h1>
    <h2>
        <label for=\"\">Adresse</label>
        ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "adresse", []), 'widget');
        echo "
    </h2>
    <h3>";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute(($context["chantier"] ?? $this->getContext($context, "chantier")), "type", []), "html", null, true);
        echo "</h3>
    <h4>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute(($context["chantier"] ?? $this->getContext($context, "chantier")), "nombreBiens", []), "html", null, true);
        echo "</h4>

    <table style=\"width: 100%;\" border=\"1\">
        <tbody>
        <tr>
            <th colspan=\"1\" bgcolor=\"black\"></th>
            ";
        // line 52
        if ((($context["nombreSuppParquet"] ?? $this->getContext($context, "nombreSuppParquet")) > 0)) {
            // line 53
            echo "                <th colspan=\"";
            echo twig_escape_filter($this->env, ($context["colspanParquet"] ?? $this->getContext($context, "colspanParquet")), "html", null, true);
            echo "\">Parquet</th>
            ";
        }
        // line 55
        echo "            ";
        if ((($context["nombreSuppTerrasse"] ?? $this->getContext($context, "nombreSuppTerrasse")) > 0)) {
            // line 56
            echo "                <th colspan=\"";
            echo twig_escape_filter($this->env, ($context["colspanTerrasse"] ?? $this->getContext($context, "colspanTerrasse")), "html", null, true);
            echo "\">Terrasse</th>
            ";
        }
        // line 58
        echo "        </tr>
        <tr>
            <th>Nom</th>
            ";
        // line 61
        if ((($context["nombreSuppParquet"] ?? $this->getContext($context, "nombreSuppParquet")) > 0)) {
            // line 62
            echo "                <th>Superficie</th>
                <th>Coloris</th>
                <th>Préparation</th>
                <th>Parquet</th>
                <th>Plinthe</th>
                <th>Acrylique</th>
                <th>Seuil</th>
                ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["oneBien"] ?? $this->getContext($context, "oneBien")), "supplementParquets", []));
            foreach ($context['_seq'] as $context["_key"] => $context["supplementParquet"]) {
                // line 70
                echo "                    <th>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["supplementParquet"], "designation", []), "html", null, true);
                echo "</th>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplementParquet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "            ";
        }
        // line 73
        echo "            ";
        if ((($context["nombreSuppTerrasse"] ?? $this->getContext($context, "nombreSuppTerrasse")) > 0)) {
            // line 74
            echo "                <th>Superficie</th>
                <th>Cadre</th>
                <th>Platelage</th>
                <th>Vissage</th>
                ";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["oneBien"] ?? $this->getContext($context, "oneBien")), "supplementTerrasses", []));
            foreach ($context['_seq'] as $context["_key"] => $context["supplementTerrasse"]) {
                // line 79
                echo "                    <th>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["supplementTerrasse"], "designation", []), "html", null, true);
                echo "</th>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplementTerrasse'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "            ";
        }
        // line 82
        echo "
        </tr>
        ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "biens", []), "children", []));
        foreach ($context['_seq'] as $context["_key"] => $context["formulaire"]) {
            // line 85
            echo "            <tr>
                <td>";
            // line 86
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "nom", []), 'widget');
            echo "</td>
                ";
            // line 87
            if ((($context["nombreSuppParquet"] ?? $this->getContext($context, "nombreSuppParquet")) > 0)) {
                // line 88
                echo "                    <td>";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "superficieParquet", []), 'widget');
                echo "</td>
                    <td>
                        <ul class=\"coloris\" data-prototype=\"";
                // line 90
                echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($context["formulaire"], "colorisParquets", []), "vars", []), "prototype", []), 'widget'), "html_attr");
                echo "\">
                            ";
                // line 91
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["formulaire"], "colorisParquets", []));
                foreach ($context['_seq'] as $context["_key"] => $context["coloris"]) {
                    // line 92
                    echo "                                <li>
                                    <div class=\"row js-delete-row\">
                                        <div class=\"js-coloris-parquet-item\">
                                            ";
                    // line 95
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($context["coloris"], "nom", []), 'widget');
                    echo "
                                            ";
                    // line 96
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($context["coloris"], "codeCouleur", []), 'widget');
                    echo "
                                            <a href=\"#\" class=\"js-remove-coloris-parquet pull-right\">
                                                X
                                                <span class=\"fa fa-close\"></span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coloris'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                echo "                        </ul>
                    </td>
                    <td>";
                // line 107
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "preparationParquet", []), 'widget');
                echo "</td>
                    <td>";
                // line 108
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "parquetParquet", []), 'widget');
                echo "</td>
                    <td>";
                // line 109
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "plintheParquet", []), 'widget');
                echo "</td>
                    <td>";
                // line 110
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "acryliqueParquet", []), 'widget');
                echo "</td>
                    <td>";
                // line 111
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "seuilParquet", []), 'widget');
                echo "</td>
                    ";
                // line 112
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["oneBien"] ?? $this->getContext($context, "oneBien")), "supplementParquets", []));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["supplementParquet"]) {
                    // line 113
                    echo "                        <td>";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "supplementParquets", []), $this->getAttribute($context["loop"], "index0", []), [], "array"), 'widget');
                    echo "</td>
                    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplementParquet'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 115
                echo "                ";
            }
            // line 116
            echo "                ";
            if ((($context["nombreSuppTerrasse"] ?? $this->getContext($context, "nombreSuppTerrasse")) > 0)) {
                // line 117
                echo "                    <td>";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "superficieTerrasse", []), 'widget');
                echo "</td>
                    <td>";
                // line 118
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "cadreTerrasse", []), 'widget');
                echo "</td>
                    <td>";
                // line 119
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "platelageTerrasse", []), 'widget');
                echo "</td>
                    <td>";
                // line 120
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "vissageTerrasse", []), 'widget');
                echo "</td>
                    ";
                // line 121
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["oneBien"] ?? $this->getContext($context, "oneBien")), "supplementTerrasses", []));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["supplementTerrasse"]) {
                    // line 122
                    echo "                        <td>
                            ";
                    // line 123
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["formulaire"], "children", []), "supplementTerrasses", []), $this->getAttribute($context["loop"], "index0", []), [], "array"), "etat", []), 'widget');
                    echo "
                        </td>
                    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplementTerrasse'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 126
                echo "                ";
            }
            // line 127
            echo "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formulaire'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "        </tbody>
    </table>
    <input type=\"submit\" class=\"hidden\" value=\"editer\">
    ";
        // line 132
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_end');
        echo "


    <ul>
        <li>
            <a href=\"";
        // line 137
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("chantier_index");
        echo "\">Back to the list</a>
        </li>
        <li>
            <a href=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("chantier_edit", ["id" => $this->getAttribute(($context["chantier"] ?? $this->getContext($context, "chantier")), "id", [])]), "html", null, true);
        echo "\">Edit</a>
        </li>
        <li>
            ";
        // line 143
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["delete_form"] ?? $this->getContext($context, "delete_form")), 'form_start');
        echo "
                <input type=\"submit\" value=\"Delete\">
            ";
        // line 145
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["delete_form"] ?? $this->getContext($context, "delete_form")), 'form_end');
        echo "
        </li>
    </ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 151
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 152
        echo "    <script
            src=\"https://code.jquery.com/jquery-3.4.1.js\"
            integrity=\"sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=\"
            crossorigin=\"anonymous\">

    </script>
    <script src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("Js/creation_bien.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "chantier/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  478 => 158,  470 => 152,  461 => 151,  447 => 145,  442 => 143,  436 => 140,  430 => 137,  422 => 132,  417 => 129,  410 => 127,  407 => 126,  390 => 123,  387 => 122,  370 => 121,  366 => 120,  362 => 119,  358 => 118,  353 => 117,  350 => 116,  347 => 115,  330 => 113,  313 => 112,  309 => 111,  305 => 110,  301 => 109,  297 => 108,  293 => 107,  289 => 105,  274 => 96,  270 => 95,  265 => 92,  261 => 91,  257 => 90,  251 => 88,  249 => 87,  245 => 86,  242 => 85,  238 => 84,  234 => 82,  231 => 81,  222 => 79,  218 => 78,  212 => 74,  209 => 73,  206 => 72,  197 => 70,  193 => 69,  184 => 62,  182 => 61,  177 => 58,  171 => 56,  168 => 55,  162 => 53,  160 => 52,  151 => 46,  147 => 45,  142 => 43,  136 => 40,  131 => 38,  124 => 34,  107 => 19,  105 => 18,  102 => 17,  96 => 16,  93 => 15,  90 => 14,  87 => 13,  84 => 12,  80 => 11,  77 => 10,  74 => 9,  72 => 8,  69 => 7,  66 => 6,  64 => 5,  61 => 4,  52 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}

    {% set nombreSuppTerrasse = 0 %}
    {% set nombreSuppParquet = 0 %}

    {% set colspanTerrasse = 0 %}
    {% set colspanParquet = 0 %}

    {% for bien in chantier.biens %}
        {% set nombreSuppTerrasse = bien.supplementTerrasses|length %}
        {% set colspanTerrasse = 4 + nombreSuppTerrasse %}
        {% set nombreSuppParquet = bien.supplementParquets|length %}
        {% set colspanParquet = 7 + nombreSuppParquet %}
    {% endfor %}

    {% set pourcentTd  = 100 / (colspanParquet + colspanTerrasse + 1) %}

    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th {
            height: 50px;
        }

        td {
            width: {{ pourcentTd }}%;
            height: auto;
        }
    </style>
    {{ form_start(form) }}

    <h1>Chantier {{ form_widget(form.nom) }}</h1>
    <h2>
        <label for=\"\">Adresse</label>
        {{ form_widget(form.adresse) }}
    </h2>
    <h3>{{ chantier.type }}</h3>
    <h4>{{ chantier.nombreBiens }}</h4>

    <table style=\"width: 100%;\" border=\"1\">
        <tbody>
        <tr>
            <th colspan=\"1\" bgcolor=\"black\"></th>
            {% if nombreSuppParquet > 0 %}
                <th colspan=\"{{ colspanParquet }}\">Parquet</th>
            {% endif %}
            {% if nombreSuppTerrasse > 0 %}
                <th colspan=\"{{ colspanTerrasse }}\">Terrasse</th>
            {% endif %}
        </tr>
        <tr>
            <th>Nom</th>
            {% if nombreSuppParquet > 0 %}
                <th>Superficie</th>
                <th>Coloris</th>
                <th>Préparation</th>
                <th>Parquet</th>
                <th>Plinthe</th>
                <th>Acrylique</th>
                <th>Seuil</th>
                {% for supplementParquet in oneBien.supplementParquets %}
                    <th>{{ supplementParquet.designation }}</th>
                {% endfor %}
            {% endif %}
            {% if nombreSuppTerrasse > 0 %}
                <th>Superficie</th>
                <th>Cadre</th>
                <th>Platelage</th>
                <th>Vissage</th>
                {% for supplementTerrasse in oneBien.supplementTerrasses %}
                    <th>{{ supplementTerrasse.designation }}</th>
                {% endfor %}
            {% endif %}

        </tr>
        {% for formulaire in form.biens.children %}
            <tr>
                <td>{{ form_widget(formulaire.children.nom) }}</td>
                {% if nombreSuppParquet > 0 %}
                    <td>{{ form_widget(formulaire.children.superficieParquet) }}</td>
                    <td>
                        <ul class=\"coloris\" data-prototype=\"{{ form_widget(formulaire.colorisParquets.vars.prototype)|e('html_attr') }}\">
                            {% for coloris in formulaire.colorisParquets %}
                                <li>
                                    <div class=\"row js-delete-row\">
                                        <div class=\"js-coloris-parquet-item\">
                                            {{ form_widget(coloris.nom) }}
                                            {{ form_widget(coloris.codeCouleur) }}
                                            <a href=\"#\" class=\"js-remove-coloris-parquet pull-right\">
                                                X
                                                <span class=\"fa fa-close\"></span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            {% endfor %}
                        </ul>
                    </td>
                    <td>{{ form_widget(formulaire.children.preparationParquet) }}</td>
                    <td>{{ form_widget(formulaire.children.parquetParquet) }}</td>
                    <td>{{ form_widget(formulaire.children.plintheParquet) }}</td>
                    <td>{{ form_widget(formulaire.children.acryliqueParquet) }}</td>
                    <td>{{ form_widget(formulaire.children.seuilParquet) }}</td>
                    {% for supplementParquet in oneBien.supplementParquets %}
                        <td>{{ form_widget(formulaire.children.supplementParquets[loop.index0]) }}</td>
                    {% endfor %}
                {% endif %}
                {% if nombreSuppTerrasse > 0 %}
                    <td>{{ form_widget(formulaire.children.superficieTerrasse) }}</td>
                    <td>{{ form_widget(formulaire.children.cadreTerrasse) }}</td>
                    <td>{{ form_widget(formulaire.children.platelageTerrasse) }}</td>
                    <td>{{ form_widget(formulaire.children.vissageTerrasse) }}</td>
                    {% for supplementTerrasse in oneBien.supplementTerrasses %}
                        <td>
                            {{ form_widget(formulaire.children.supplementTerrasses[loop.index0].etat) }}
                        </td>
                    {% endfor %}
                {% endif %}
            </tr>
        {% endfor %}
        </tbody>
    </table>
    <input type=\"submit\" class=\"hidden\" value=\"editer\">
    {{ form_end(form) }}


    <ul>
        <li>
            <a href=\"{{ path('chantier_index') }}\">Back to the list</a>
        </li>
        <li>
            <a href=\"{{ path('chantier_edit', { 'id': chantier.id }) }}\">Edit</a>
        </li>
        <li>
            {{ form_start(delete_form) }}
                <input type=\"submit\" value=\"Delete\">
            {{ form_end(delete_form) }}
        </li>
    </ul>
{% endblock %}


{% block javascripts %}
    <script
            src=\"https://code.jquery.com/jquery-3.4.1.js\"
            integrity=\"sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=\"
            crossorigin=\"anonymous\">

    </script>
    <script src=\"{{ asset('Js/creation_bien.js') }}\"></script>
{% endblock %}
", "chantier/show.html.twig", "/home/micka/Documents/workspace/projet_symfony3/sir_du_cottage_bis/app/Resources/views/chantier/show.html.twig");
    }
}
