# Eindopdracht Data Management
## Student info
- Voornaam: Jeroen
- Familienaam: Dewelde
## Project Info
Het aanamaken van de database kan met het file 'CREATE.SQL', het seeden van de database kan met het file 'SEED.SQL'. 
Extra bijlagen in /resources:
- EERD.mwb (schema gemaakt met MySQL WorkBench)
- Jeroen_Dewelde_eindopdracht_ERD.png ( ERD schema )

### Tabellen
- categories
    - id
    - name
- conversion-type
    - id
    - grams
    - name
- cooks
    - id
    - firstname
    - lastname
    - bio
    - quote
    - picture-url
- ingredients
    - id
    - name
    - image-url
- recipe_has_ingredients
    - recipes_id (FK)
    - ingredients_id (FK)
    - conversion-type_id (FK)
    - quantity
- recipes
    - id
    - title
    - teaser-text
    - image-url
    - preparation-time
    - level
    - amount-of-people
    - cooks_id (FK)
- recipe-steps
    - id
    - step-number
    - title
    - body
    - image-url
    - recipes_id (FK)

