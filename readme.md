# Emoji Rename

## Description
https://github.com/twitter/twemoji にてダウンロードできる絵文字ファイルのファイル名を、unified code形式から絵文字単体に置き換えます。

例 : `1f600.svg` → `😀.svg`

## Usage
1. `twemoji/assets/svg` に絵文字ファイルをダウンロードします。
2. ./emojiディレクトリに対象の絵文字ファイルを配置
3. main.phpを実行

> [!NOTE]
> main.phpの3行目にあるフォルダパスを変更することで、絵文字ファイルの配置場所を変更できます。

> [!WARNING]
> ファイルはコピーせず、そのまま上書きします。絵文字ファイルをバックアップしてから実行してください。

※ 絵文字ファイルのファイル名は、絵文字のunified codeに準拠している必要があります。